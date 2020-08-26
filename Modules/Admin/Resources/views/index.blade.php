@extends('admin::layouts.master')
@section('content')

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    <h1 class="page-header">Tổng quan Shop ThanhBK</h1>
    <div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative">
            <a href=""><img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="170" height="170" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);margin: 0;color: white" đơn hàng cần xử lý</h4></a>
        </div>
    



    </div>
    <div class="row">
        
        <div class="col-sm-8">
            <a href=""><h2>Danh sách đơn hàng mới</h2></a>


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
                
                

                </tbody>
            </table>
        </div>
        <div class="col-sm-4">

            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <a href="}"><h2 class="sub-header">Danh sách liên hệ mới nhất</h2></a>


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
                
                

                </tbody>
            </table>
        </div>
    </div>
@stop


