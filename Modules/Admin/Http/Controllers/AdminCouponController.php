<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Coupon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdminCouponController extends Controller
{
     public function index()
    {
        $coupons = Coupon::get();
        $viewData = [
          'coupons'=>$coupons
        ];
        return view('admin::coupon.index',$viewData);
    }
    public function create()
    {
        return view('admin::coupon.create');
    }
    public function store(Request $request)
    {
        $this->insertOrUpdate($request);
        return redirect()->back()->with('success','Thêm mới thành công');
    }
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin::coupon.update', compact('coupon'));
    }
    public function update(Request $request,$id)
    {

        $this->insertOrUpdate($request,$id);
        return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function insertOrUpdate ($request, $id='0')
    {
        $code = 1;
        try {
            $coupon   = new Coupon();
            if($id)
            {
                $coupon=Coupon::find($id);
            }
            $coupon->co_name = $request->name;
            $coupon->co_code = $request->co_code;
            $coupon->co_type = $request->co_type;
            $coupon->co_value = $request->co_value;
            $coupon->co_number = $request->co_number;
            $coupon->save();
        } catch (\Exception $exception)
        {
            $code = 0;
            Log::error("[Error insertOrUpdate Coupons]".$exception->getMessage());
        }
        return $code;
    }
    public function delete($id)
    {
        DB::table('coupons')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
    public function action($action, $id)
    {
        $messages = '';
        if($action)
        {
            $category = Coupon::find($id);
            switch ($action)
            {
                case 'delete':
                    $category->delete();
                    $messages = 'Xoá dữ liệu thành công';
                    break;
                
            }
        }
        return redirect()->back()->with('success',$messages);
    }
}
