@extends('layouts.home')
@section('body')
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form class="form-signin" method = "POST" action="">
            @csrf
              <div class="form-label-group">
                <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus>
                @if($errors->has('email'))
                <div class="error-text">
                    {{$errors->first('email')}}
                </div>
                @endif
                <label for="inputEmail"><small>Email address</small></label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
                @if($errors->has('password'))
                <div class="error-text">
                    {{$errors->first('password')}}
                </div>
                @endif
                <label for="inputPassword"><small>Password</small></label>
              </div>
              <!-- <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
                <label for="inputPassword"><small>Password (Confirm)</small></label>
              </div> -->
              <div class="form-label-group">
                <input type="text" name="name"  class="form-control" placeholder="Name" >
                <label for="inputPassword"><small>Your Name</small></label>
              </div>
              <div class="form-label-group">
                <input type="text"  class="form-control" name ="phone" placeholder="Phone" >
                <label for="inputPassword"><small>Your Phone Number</small></label>
                <a class = "pull-right" href="{{route('get.login')}}"> <label><small>Login</small></label></a>
              </div>
              <!-- <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button> -->
              <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" name="login" value="Register">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
