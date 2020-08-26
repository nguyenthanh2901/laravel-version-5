<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{
   public function index(Request $request)
   {

       $products = Product::with('category:id,c_name');
        if ($request->name) $products->where('pro_name', 'like', '%'.$request->name.'%');
        if ($request->cate) $products->where('pro_category_id', $request->cate);
        $products=$products->orderByDesc('id')->paginate(10);
        $categories = $this->getCategories();
        $pro = Product::count();
       $viewData =[
        'pro'=>$pro,
         'products'=>$products,
           'categories'=>$categories
       ];
       return view('admin::product.index',$viewData);
   }
   public function create()
   {
       $categories = $this->getCategories();
       return view('admin::product.create', compact('categories'));
   }
   public function store(RequestProduct $requestProduct)
   {
        $this->insertOrUpdate($requestProduct);
       return redirect()->back()->with('success','Lưu thành công');
   }
   public function edit($id)
   {
       $product = Product::find($id);
       $categories = $this->getCategories();
       return view('admin::product.update',compact('product','categories'));
   }
   public function update(RequestProduct $requestProduct,$id)
   {
       $this->insertOrUpdate($requestProduct,$id);
       return redirect()->back()->with('success','Cập nhật thành công');
   }
   public function getCategories()
   {
       return Category::all();
   }
    public function insertOrUpdate($requestProduct, $id='')
    {
        $product = new Product();
        if ($id) $product = Product::find($id);
        $product->pro_name = $requestProduct->pro_name;
        $product->pro_slug = str_slug($requestProduct->pro_name);
        $product->pro_category_id = $requestProduct->pro_category_id;
        $product->pro_description_ceo = $requestProduct-> pro_description_ceo? $requestProduct-> pro_description_ceo:$requestProduct->pro_name;
        $product->pro_title_ceo = $requestProduct->pro_title_ceo ? $requestProduct->pro_title_ceo: $requestProduct->pro_name;
        $product->pro_price= $requestProduct->pro_price;
        $product->pro_sale= $requestProduct->pro_sale;
        $product->pro_number= $requestProduct->pro_number;
        $product->pro_description= $requestProduct->pro_description;
        $product->pro_content= $requestProduct->pro_content;
        $product->pro_color= $requestProduct->pro_color;
        // $product->pro_memory= $requestProduct->pro_memory;
        $product->pro_hot = $requestProduct->pro_hot ? $requestProduct->pro_hot : 0;

        if ($requestProduct->hasFile('avatar'))
        {
            $file=upload_image('avatar');
            if (isset($file['name']))
            {
                $product->pro_avatar=$file['name'];
            }

        }
        $product->save();
    }
    public function delete($id)
    {
        \DB::table('products')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
    public function action($action,$id)
    {
        if ($action) {
            $product = Product::find($id);
            switch ($action) {
                case 'active':
                    $product->pro_active = $product->pro_active ? 0 : 1;
                    break;

                case 'hot':
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    break;
            }

            $product->save();
        }

        return redirect()->back();
    }
    }