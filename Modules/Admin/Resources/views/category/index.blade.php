@extends('admin::layouts.master')
@section('content')
   <div class="page-header">
       <ol class="breadcrumb">
           <li><a href="{{route('admin.home')}}">Trang chủ Admin</a></li>
           <li><a href="{{route('admin.get.list.category')}}">Danh mục</a></li>
           <li class="active">Danh sách</li>
       </ol>
       </div>
    <div class="table-responsive">
        <h2>Quản lý danh mục <a href="{{route('admin.get.create.category')}}" style="color: #5cb85c" class="pull-right">Thêm mới</a></h2>
        <h4>Tổng số danh mục: {{$category}}</h4>
        <table class="table table-striped">
            <thead>

            <tr style="color: red; font-size: 20px">
                <td>ID</td>
                <td>Tên danh mục</td>
                <td>Logo</td>
                <td>Title</td>
                <td>Trạng thái</td>
                <td>Thao tác</td>
            </tr>
            <tbody>
            @if(isset($categories))
                @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->c_name}}</td>
                <td>
                     <img src="{{ pare_url_file($category->c_avartar) }}" alt=""  style="width: 50px;height: 50px;">
                </td>
                <td>{{$category->c_title_ceo}}</td>
                <td><a href="{{route('admin.get.action.category',['active',$category->id])}}">{{$category->getStatus($category->c_active)['name']}}</a></td>
                <td>
                    <a class="btn_customer_action"   href="{{route('admin.get.edit.category', $category->id)}} "><i class="fas fa-pen"></i> Sửa</a>
                    <a style="padding-left: 10px" class="btn_customer_action"  href="{{route('admin.get.action.category',['delete',$category->id])}}"><i class="fas fa-trash-alt"></i>Xóa</a>
                </td>
            </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
@stop
