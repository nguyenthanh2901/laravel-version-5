@extends('layouts.home')
@section('body')
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" method="post" action="">
            @csrf
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail"><small>Email address</small></label>
              </div>

              <div class="form-label-group">
                <input type="text"  name="password " class="form-control" placeholder="Password" required>
                <label for="inputPassword"><small>Password</small></label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1"><small>Remember password</small></label>
                <a href="{{route('get.register')}}"><label class="pull-right" ><small>Register</small></label></a>
              </div>
              <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" name="login" value="Login">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
