<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use Session;
use App\Mail\ShoppingMail;

class ShoppingCartController extends FrontendController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function addProduct(Request $request,$id)
    {
        $product = Product::select('pro_name','id','pro_price','pro_sale','pro_avatar','pro_number','pro_slug')->find($id);

        if (!$product) return redirect('/');

        $price = $product->pro_price;
        if ($product->pro_sale)
        {
            $price =  $price * (100 - $product->pro_sale)/ 100;
        }
        if ($product->pro_number == 0 )
        {
            return redirect()->back()->with('warning','Sản phẩm đã hết hàng');
        }

        \Cart::add([
            'id'      => $id,
            'name'    => $product->pro_name,
            'qty'     => 1,
            'price'   => $price,
            'options' => [
                'avatar' => $product->pro_avatar,
                'sale'   => $product->pro_sale,
                'price_old' => $product->pro_price,
                'pro_slug'=>$product->pro_slug
            ],
        ]);

        return redirect()->back()->with('success','Đã thêm sản phẩm vào giỏ hàng');
    }

    public function checkCoupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('co_code',$data['co_coupon'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {

                    $coupon_session=Session::get('coupon');
                    if ($coupon_session==true) {
                    $is_valuable = 0;
                    if ($is_valuable==0) {
                        $cou[] = array(
                            'co_code'=>$coupon->co_code,
                             'co_type'=>$coupon->co_type,
                              'co_number'=>$coupon->co_number,

                        );
                        Session::put('coupon',$cou);
                    }
                } else {
                    $cou[] =array(
                        'co_code'=>$coupon->co_code,
                             'co_type'=>$coupon->co_type,
                              'co_value'=>$coupon->co_value,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                    return redirect()->back();
                }

         else {
             return redirect()->back()->with('success','Mã giảm giá đã hết');
        }}
        else {
            return redirect()->back()->with('success','Mã giảm giá không đúng');
        }
    }

    public function getListShoppingCart()
    {
        $products = \Cart::content();
        $totalMoney =  (int)str_replace(',','',\Cart::subtotal(0,3));
        return view('shopping.index',compact('products','totalMoney'));
    }
    public function getFormPay(Request $request)
    {
        $products = \Cart::content();
        $totalMoney =  (int)str_replace(',','',\Cart::subtotal(0,3));
        return view('shopping.pay',compact('products','totalMoney'));

    }
    public function deleteProductItem($key)
    {
        \Cart::remove($key);

        return redirect()->back();
    }
    public function updateShoppingCart(Request $request, $id)
    {
        //lay tham so
        if ($request->ajax()) {
            $qty = $request->qty;
            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);

            //kt ton tai san pham
            if (!$product) return response(['messages' => 'không tồn tại sản phẩm']);

            //kt so luong san pham
            if ($product->pro_number < $qty) {
                return response(['messages' => 'không tồn đủ số lượng']);
            }
            //update
            \Cart::update($id, $qty);

            return response(['messages' => 'cập nhật thành công']);
        }
    }

    public function saveInfoShoppingCart(Request $request)
    {   
        $transactionId = 	Transaction::insertGetId([
            'tr_user_id' => (get_data_user('web')) ? get_data_user('web') : '0' ,
            'tr_total'   =>  (int)$request->total,
            'tr_note'    => $request->note,
            'tr_address' => $request->address,
            'tr_phone'   => $request->phone,
            'tr_user_name'=>$request->name,
            'tr_phone'   => $request->phone,
            'tr_type'    =>$request->type,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        


        if ($transactionId)
        {
            $products = \Cart::content();
            Mail::to( $request->email)->send(new ShoppingMail($products));
            foreach ($products as $product)
            {
                Order::insert([
                    'or_transaction_id'	 => $transactionId,
                    'or_product_id'         => $product->id,
                    'or_qty'                => $product->qty,
                    'or_price'              => $product->options->price_old,
                    'or_sale'               => $product->options->sale,
                ]);
            }
        }

        \Cart::destroy();

        return redirect()->route('home')->with('success','Đặt hàng thành công. Xin đợi xác nhận từ Shop trong vòng 24h');
    }

}
