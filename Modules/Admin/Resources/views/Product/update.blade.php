@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{{route('admin.home')}}}">Trang chủ Admin</a></li>
            <li><a href="{{route('admin.get.list.product')}}" title="Danh mục">Sản phẩm</a></li>
            <li class="active">Cập nhật</li>
        </ol>
    </div>
    <div >
        <div class="row">
            @include("admin::product.form")
        </div>
    </div>
@stop
