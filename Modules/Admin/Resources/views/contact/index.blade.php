@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ Admin</a></li>
            <li><a href="{{route('admin.get.list.contact')}}">Liên hệ</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lý liên hệ</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($contacts))
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->c_title }}</td>
                        <td>{{ $contact->c_name }}</td>
                        <td>{{ $contact->c_email }}</td>
                        <td>0{{ $contact->c_phone }}</td>
                        <td>{{ $contact->c_content }}</td>
                        <td>
                            @if ( $contact->c_status == 1)
                                <span class="label label-success">Đã xử lý</span>
                            @else
                                <span class="label label-default">Chưa xử lý</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn_customer_action" href="{{ route('admin.action.contact',['status',$contact->id]) }}"><i class="fas fa-pen" ></i> Cập nhật</a>
                            <a class="btn_customer_action" href="{{ route('admin.get.delete.contact',[$contact->id]) }}"><i class="fas fa-trash" ></i> Xóa</a>

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
         {!! $contacts->links() !!}
    </div>
@stop
