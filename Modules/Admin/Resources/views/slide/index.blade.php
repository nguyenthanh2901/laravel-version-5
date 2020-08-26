@extends('admin::layouts.master')
@section('content')
   <div class="page-header">
       <ol class="breadcrumb">
           <li><a href="{{route('admin.home')}}">Trang chủ Admin</a></li>
           <li><a href="{{route('admin.get.list.slide')}}">Slides</a></li>
           <li class="active">Danh sách</li>
       </ol>
   </div>
   <div class="row">
       <div class="col-sm-12">
           
       </div>
   </div>
    <div class="table-responsive">
        <h2>Quản lý slide <a href="{{route('admin.get.create.slide')}}" style="color: #5cb85c" class="pull-right">Thêm mới</a></h2>
        <table class="table table-striped">
            <thead>

            <tr style="color: red; font-size: 20px">
                <td>ID</td>
                <td >Hình ảnh</td>
                <td >Ngày tạo</td>
                 <td>Xóa</td>
            </tr>
            <tbody>
               @if (isset($slides))
                   @foreach($slides as $slide)
                       <tr>
                           <td>{{$slide->id}}</td>
                           <td>
                               <img src="{{ pare_url_file($slide->s_avatar) }}" alt="" class="img img-responsive" style="width: 200px;height: 80px;">
                           </td>
                           <td>{{$slide->created_at}}</td>
                           <td>
                               <a class="btn_customer_action" href="{{ route('admin.get.delete.slide',$slide->id) }}"><i class="fas fa-trash-alt"></i> Xoá</a>
                           </td>
                       </tr>
                   @endforeach
               @endif

            </tbody>
        </table>
      
    </div>
@stop
