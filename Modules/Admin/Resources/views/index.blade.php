@extends('admin::layouts.master')
@section('content')

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    <h1 class="page-header">Tổng quan Shop ThanhBK</h1>
    <div class="row placeholders">
        <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
            <a href="{{route('admin.get.list.transaction')}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="170" height="170" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{$transactions}} đơn hàng cần xử lý</h4></a>
        </div>
        <a href="{{route('admin.get.list.contact')}}"><div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="170" height="170" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{$Contact}} liên hệ</h4>
        </div></a>
        <a href=""><div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="170" height="170" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{$Rating}} lượt đánh giá</h4>
        </div></a>
        <a href=""><div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="170" height="170" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white">{{$User}} thành viên</h4>
        </div></a>
    </div>
    <div class="row">
        
        <div class="col-sm-8">
            <a href="{{route('admin.get.list.transaction')}}"><h2>Danh sách đơn hàng mới</h2></a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Khách Hàng</th>
                    <th>Số điện thoại</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng thái</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transactionNews as $transaction)
                    <tr>
                        <td>#{{ $transaction->id }}</td>
                        <td>{{ isset($transaction->user->name) ? $transaction->user->name : '[N\A]' }}</td>
                        <td>{{ $transaction->tr_phone }}</td>
                        <td>{{ number_format($transaction->tr_total,0,',','.') }} VNĐ</td>
                        <td>
                            @if ( $transaction->tr_status == 1)
                                <div class="label-success label">Đã xử lý</div>
                            @else
                                <div href="" class="label label-default">Chờ xử lý</div>
                            @endif
                        </td>
                        <td>
                            {{ $transaction->created_at->format('d-m-Y') }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">

            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <a href="{{route('admin.get.list.contact')}}"><h2 class="sub-header">Danh sách liên hệ mới nhất</h2></a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Họ tên</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (isset($contacts))
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->c_title }}</td>
                                <td>{{ $contact->c_name }}</td>
                                <td>{{ $contact->c_content }}</td>
                                <td>
                                    @if ( $contact->c_status == 1)
                                        <span class="label label-success">Đã xử lý</span>
                                    @else
                                        <span class="label label-default">Chưa xử lý</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6"> 
            <a href=""><h2 class="sub-header">Danh sách đánh giá mới nhất</h2></a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên TV </th>
                    <th>Sản phẩm </th>
                    <th>Rating</th>
                </tr>
                </thead>
                <tbody>
                @if (isset($ratings))
                    @foreach($ratings as $rating)
                        <tr>
                            <td>{{ $rating->id }}</td>
                            <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</td>
                            <td><a href="">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a></td>
                            <td>{{ $rating->ra_number }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop


@section('script')
    <script>
        // Create the chart

        let data = "{{ $dataMoney }}";

        dataChart = JSON.parse(data.replace(/&quot;/g,'"'));

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ doanh thu trong tháng hiện tại'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Tổng tiền'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f} VNĐ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: "Browsers",
                    colorByPoint: true,
                    data: dataChart
                }
            ]
        });
    </script>
@stop
