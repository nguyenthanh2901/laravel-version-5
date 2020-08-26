@extends('admin::layouts.master')
@section('content')
   <div class="page-header">
       <ol class="breadcrumb">
           <li><a href="{{route('admin.home')}}">Trang chủ Admin</a></li>
           <li><a href="{{route('admin.get.list.product')}}">Sản phẩm</a></li>
           <li class="active">Danh sách</li>
       </ol>
   </div>
   <div class="row">
       <div class="col-sm-12">
           <form class="form-inline" action="" style="margin-bottom: 20px">
               <div class="form-group">
                   <input type="text" class="form-control"  placeholder="Tên sản phẩm ..." name="name" value="{{ \Request::get('name') }}">
               </div>

               <div class="form-group">
                   <select name="cate" id="" class="form-control">
                       <option value="">Danh mục</option>
                       @if (isset($categories))
                           @foreach($categories as $category)
                               <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : "" }}>{{ $category->c_name }}</option>
                           @endforeach
                       @endif
                   </select>
               </div>
               <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
           </form>
       </div>
   </div>
    <div class="table-responsive">
        <h2>Quản lý sản phẩm <a href="{{route('admin.get.create.product')}}" style="color: #5cb85c" class="pull-right">Thêm mới</a></h2>
        <h4>Tổng số sản phẩm: {{$pro}}</h4>
        <table class="table table-striped">
            <thead>

            <tr style="color: red; font-size: 20px">
                <td>ID</td>
                <td>Tên sản phẩm</td>
                <td>Loại sản phẩm</td>
                <td>Hình ảnh</td>
                <td>Trạng thái</td>
                <td>Nổi bật</td>
                <td>Thao tác</td>
            </tr>
            <tbody>
                @if (isset($products))
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->pro_name}}
                                <ul style="padding-left: 10px">
                                    <li><span>Giá: {{number_format($product->pro_price,0)}} VNĐ</span></li>
                                    <li><span>Giảm: {{$product->pro_sale}}%</span></li>
                                    <li><span>Số lượng: {{$product->pro_number}}</span></li>
                                    <li><span>Màu sắc: {{$product->pro_color}}</span></li>
                                </ul>
                            </td>
                            <td>{{isset($product->category->c_name)? $product->category->c_name: '[N\A]' }}</td>
                            <td>
                                <img src="{{ pare_url_file($product->pro_avatar) }}" alt="" class="img img-responsive" style="width: 80px;height: 80px;">
                            </td>
                            <td><a href="{{route('admin.get.action.product',['active',$product->id])}}">{{$product->getStatus($product->pro_active)['name']}}</a></td>
                            <td><a href="{{route('admin.get.action.product',['hot',$product->id])}}">{{$product->getHot($product->pro_hot)['name']}}</a></td>
                            <td>
                                <a class="btn_customer_action" href="{{ route('admin.get.edit.product',$product->id) }}"><i class="fas fa-pen" ></i> Sửa</a>
                                <a style="padding-left: 10px" class="btn_customer_action" href="{{ route('admin.get.delete.product',$product->id) }}"><i class="fas fa-trash-alt"></i> Xoá</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
         {!! $products->links() !!}
    </div>
@stop
