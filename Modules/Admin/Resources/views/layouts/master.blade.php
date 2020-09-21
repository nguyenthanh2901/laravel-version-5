<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/dashboard/">
    <title> Admin Shop ThanhBK</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">--}}
<!-- Custom styles for this template -->
    <link href="{{ asset('theme_admin/css/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Shop ThanhBK</a>


        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"></a></li>
                <li><a class="navbar-brand" href="">Log out</a></li>


            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="{{\Request::route()->getName()== 'admin.home' ? 'active' : ''}}"><a href="{{route('admin.home')}}">Dashboard</a></li>
                <li class="{{\Request::route()->getName()== 'admin.get.list.category' ? 'active' : ''}}"><a href="{{route('admin.get.list.category')}}">Categories</a></li>
                <li class=" {{\Request::route()->getName()== 'admin.get.list.product' ? 'active' : ''}}"><a href="{{route('admin.get.list.product')}}">Products</a></li>
                <li class=" {{\Request::route()->getName()== 'admin.get.list.slide' ? 'active' : ''}}"><a href="{{route('admin.get.list.slide')}}">Slides</a></li>
                <li class=" {{\Request::route()->getName()== 'admin.get.list.coupon' ? 'active' : ''}}"><a href="{{route('admin.get.list.coupon')}}">Coupons</a></li>   
                <li class=" {{\Request::route()->getName()== 'admin.get.list.article' ? 'active' : ''}}"><a href="{{route('admin.get.list.article')}}">Blogs</a></li>
                <li class=" {{\Request::route()->getName()== 'admin.get.list.contact' ? 'active' : ''}}"><a href="{{route('admin.get.list.contact')}}">Contacts</a></li>
                <li class=" {{\Request::route()->getName()== 'admin.get.list.transaction' ? 'active' : ''}}"><a href="{{route('admin.get.list.transaction')}}">Transactions</a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible" style="position: fixed;right: 20px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{ \Session::get('success') }} </strong>
                </div>
            @endif

            @if (\Session::has('danger'))
                <div class="alert alert-danger alert-dismissible" style="position: fixed;right: 20px">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{ \Session::get('danger') }} </strong>
                </div>
            @endif
            @yield('content')

    </div>
</div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('theme_admin/js/bootstrap.min.js')}}"></script>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#out_img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#input_img").change(function() {
        readURL(this);
    });
</script>
@yield('script')
</body>
</html>
