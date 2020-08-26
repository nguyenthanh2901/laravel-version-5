@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{{route('admin.home')}}}">Trang chủ Admin</a></li>
            <li><a href="{{route('admin.get.list.coupon')}}" title="Danh mục">Mã giảm giá</a></li>
            <li class="active">Cập nhật</li>
        </ol>
    </div>
    <div >
        <div class="row">
            @include("admin::coupon.form")
        </div>
    </div>
@stop
