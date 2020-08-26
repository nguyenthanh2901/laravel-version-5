@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{{route('admin.home')}}}">Trang chủ Admin</a></li>
            <li><a href="{{route('admin.get.list.slide')}}" title="Danh mục">Slides</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </div>
   <div >
       <div class="row">
          @include("admin::slide.form")
       </div>
   </div>
@stop
