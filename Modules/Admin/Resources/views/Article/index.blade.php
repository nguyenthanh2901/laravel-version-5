@extends('admin::layouts.master')
@section('content')
   <div class="page-header">
       <ol class="breadcrumb">
           <li><a href="{{route('admin.home')}}">Trang chủ Admin</a></li>
           <li><a href="">Tin tức</a></li>
           <li class="active">Danh sách</li>
       </ol>
   </div>
   <div class="row">
       <div class="col-sm-12">
           <form class="form-inline" action="" style="margin-bottom: 20px">
               <div class="form-group">
                   <input type="text" class="form-control"  placeholder="Tên bài viết ..." name="name" value="{{ \Request::get('name') }}">
               </div>
               <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
           </form>
       </div>
   </div>
    <div class="table-responsive">
        <h2>Quản lý bài viết <a href="{{route('admin.get.create.article')}}" style="color: #5cb85c" class="pull-right">Thêm mới</a></h2>
        <table class="table table-striped">
            <thead>

            <tr style="color: red; font-size: 20px">
                <td>ID</td>
                <td width="30%">Tên bài viết</td>
                <td>Hình ảnh</td>
                <td>Ngày tạo</td>
                <td>Trạng thái</td>
                <td>Thao tác</td>
            </tr>
            <tbody>
                @if (isset($articles))
                    @foreach($articles as $article)
                        <tr>
                            <td>#{{$article->id}}</td>
                            <td><a href="">{{$article->a_name}}</a></td>
                            <td>
                                <img src="{{ pare_url_file($article->a_avatar) }}" alt="" class="img img-responsive" style="width: 80px;height: 80px;">
                            </td>
                            <td>{{ $article->created_at }}</td>
                            <td><a href="{{route('admin.get.action.article',['active',$article->id])}}">{{$article->getStatus($article->a_active)['name']}}</a></td>
                            <td>
                                <a class="btn_customer_action" href="{{ route('admin.get.edit.article',$article->id) }}"><i class="fas fa-pen" ></i> Sửa</a>
                                <a style="padding-left: 10px" class="btn_customer_action" href="{{ route('admin.get.delete.article',$article->id) }}"><i class="fas fa-trash-alt"></i> Xoá</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
@stop
