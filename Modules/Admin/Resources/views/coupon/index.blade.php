@extends('admin::layouts.master')
@section('content')
   <div class="page-header">
       <ol class="breadcrumb">
           <li><a href="{{route('admin.home')}}">Trang chủ Admin</a></li>
           <li><a href="{{route('admin.get.list.coupon')}}">Mã giảm giá</a></li>
           <li class="active">Danh sách</li>
       </ol>
       </div>
    <div class="table-responsive">
        <h2>Quản lý mã giảm giá <a href="{{route('admin.get.create.coupon')}}" style="color: #5cb85c" class="pull-right">Thêm mới</a></h2>
        <table class="table table-striped">
            <thead>

            <tr style="color: red; font-size: 20px">
                <td>ID</td>
                <td>Tên</td>
                <td>Mã giảm giá</td>
                <td>Phân loại</td>
                <td>Giá trị</td>
                <td>Số lượng</td>
                
                <td>Thao tác</td>
            </tr>
            <tbody>
            @if(isset($coupons))
                @foreach($coupons as $coupon)
            <tr>
                <td>{{$coupon->id}}</td>
                <td>{{$coupon->co_name}}</td>
                <td>{{$coupon->co_code}}</td>
                <td>{{($coupon->co_type)}}</td>
                
                 <td>{{($coupon->co_value)}}</td>
                <td>{{($coupon->co_number)}}</td>
                
                <td>
                    <a class="btn_customer_action"   href="{{route('admin.get.edit.coupon', $coupon->id)}} "><i class="fas fa-pen"></i> Sửa</a>
                    <a style="padding-left: 10px" class="btn_customer_action"  href="{{route('admin.get.action.coupon',['delete',$coupon->id])}}"><i class="fas fa-trash-alt"></i>Xóa</a>
                </td>
            </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
@stop
