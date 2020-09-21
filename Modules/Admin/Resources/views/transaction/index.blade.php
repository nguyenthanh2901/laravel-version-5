
@extends('admin::layouts.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
            <li><a href="{{route('admin.get.list.transaction')}}">Đơn hàng</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" action="" style="margin-bottom: 20px">
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control"  placeholder="Tên sản phẩm ..." name="name" value="{{ \Request::get('name') }}">--}}
                {{--</div>--}}
                <div class="form-group col-sm-4" style="display: inline-block">
                    <input style="width: 100%" type="text" id="dates" name="dates" value="{{ Request::query('dates') }}" class="form-control" autocomplete="off" placeholder="Ví dụ: 06/20/2020 - 06/22/2020">
                </div>

                <div class="form-group">
                    <select name="status" id="" class="form-control">
                        <option value="">Tình trạng đơn hàng</option>
                        <option value="2" {{ Request::get('status') == 2 ? "selected='seletedd'" : '' }}>Chờ xử lý</option>
                        <option value="1" {{ Request::get('status') == 1 ? "selected='seletedd'" : '' }}>Đã xử lý</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <h2>Quản lý đơn hàng</h2>
        <p> Tổng số đơn hàng : <b>{{$countTransaction}}</b> </p>
        <p> Tổng giá trị đơn hàng : <b>{{number_format($sum)}} $</b> </p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Thông tin khách hàng</th>
                <th>Tổng Tiền</th>
                <th>Trạng thái</th>
                <th style="width: 15%">Email</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>
                        <div><b style="display: inline-block;width: 70px">Name </b>{{$transaction->tr_user_name}}</div>
                        <div><b style="display: inline-block;width: 70px">Address </b>{{ $transaction->tr_address }}</div>
                        <div><b style="display: inline-block;width: 70px">Phone </b>{{ $transaction->tr_phone }}</div>
                        <div><b style="display: inline-block;width: 70px">Time </b>{{ $transaction->created_at }}</div>
                    </td>
                    <td>{{ number_format($transaction->tr_total,0,',','.') }} $</td>
                    <td>
                        @if ( $transaction->tr_status == 1)
                            <a href="#" class="label-success label">Đã xử lý</a> <a href="{{route('admin.get.update.transaction',$transaction->id)}}" class="label-default label">Cập nhật</a> 
                            <div>TT: {{$transaction->tr_sta}}</div>
                            <div>ĐVVC: {{$transaction->tr_shipper}}</div>
                            <div>MVĐ: <a href="http://www.vnpost.vn/vi-vn/dinh-vi/buu-pham?key={{$transaction->tr_codeship}}" class="">{{$transaction->tr_codeship}}</a></div>
                            
                            
                        @else
                            <a href="{{route('admin.get.active.transaction',$transaction->id)}}" class="label label-default">Chờ xử lý</a>
                        @endif
                    </td>
                    <td>
                       
                            <span "">{{$transaction->tr_type}}</span>
                       
                    </td>
                    <td>
                        <a class="btn_customer_action" href="{{route('admin.get.delete.transaction',$transaction->id)}}}"><i class="fas fa-trash-alt"></i> Xoá</a>
                        <a style="padding-left: 10px" class="btn_customer_action js_order_item" data-id="{{ $transaction->id }}" href="{{ route('admin.get.view.order',$transaction->id) }}"><i class="fas fa-eye"></i>Xem</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {!! $transactions->links() !!}
        </div>
    </div>

    <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết mã đơn hàng #<b class="transaciont_id"></b></h4>
                </div>
                <div class="modal-body" id="md_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script>
        $(function(){
            $(".js_order_item").click(function(event){
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $("#md_content").html('')
                $(".transaciont_id").text('').text($this.attr('data-id'));

                $("#myModalOrder").modal('show');

                $.ajax({
                    url: url,
                }).done(function(result) {
                    if (result)
                    {
                        $("#md_content").append(result);
                    }
                });
            });
        })
        $(function () {

            $('input[name="dates"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });

            $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        })
    </script>
@stop
