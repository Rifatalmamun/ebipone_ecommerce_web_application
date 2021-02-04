<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <title>Ecommerce Admin Login</title>
        <link rel="shortcut icon" href="dist/images/favicon.ico" />
        <meta name="viewport" content="width=device-width,initial-scale=1"> 

        <!-- START: Template CSS-->
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/jquery-ui/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/jquery-ui/jquery-ui.theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/simple-line-icons/css/simple-line-icons.css')}}">        
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/flags-icon/css/flag-icon.min.css')}}"> 

        <!-- END Template CSS-->     

        <!-- START: Page CSS-->   
        <link rel="stylesheet" href="{{asset('public/backend/dist/vendors/social-button/bootstrap-social.css')}}">  
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="{{asset('public/backend/dist/css/main.css')}}">
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default">
        <!-- START: Main Content-->
        <div class="container">
            <div class="row vh-100 justify-content-between align-items-center">
                <div class="col-12">
                  <form class="row row-eq-height lockscreen  mt-5 mb-5" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                        <div class="lock-image col-12 col-sm-5" >
                          {{-- <img src="{{asset('public/backend/dist/images/rifat.jpg')}}" alt=""> --}}
                          {{-- <h5 class="mt-5">Ecommerce Admin Login</h5> --}}
                        </div>  
                        <div class="login-form col-12 col-sm-7">
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label> 
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" required="" placeholder="Enter your email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            {{-- 
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                                @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror

                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" required="" id="password" placeholder="Enter your password" name="password" required autocomplete="current-password" placeholder="Enter your password">

                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror

                            </div>

                            

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-primary" type="submit">Admin Log In </button>
                            </div>
                            {{-- <p class="my-2 text-muted">--- Or connect with ---</p>
                            <a class="btn btn-social btn-dropbox text-white mb-2">
                                <i class="icon-social-dropbox align-middle"></i>
                            </a>
                            <a class="btn btn-social btn-facebook text-white mb-2">
                                <i class="icon-social-facebook align-middle"></i>
                            </a>                                   
                            <a class="btn btn-social btn-github text-white mb-2">
                                <i class="icon-social-github align-middle"></i>
                            </a>
                            <a class="btn btn-social btn-google text-white mb-2">
                                <i class="icon-social-google align-middle"></i>
                            </a> --}}
                            {{-- @if (Route::has('admin.forgot.password'))
                                <p class="semibold-text mb-2"><a href="{{ route('admin.forgot.password') }}" >Forgot Password ?</a></p>
                            @endif --}}

                            {{-- <div class="mt-2">Don't have an account? <a href="page-register.html">Create an Account</a></div> --}}
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- END: Content-->

        <!-- START: Template JS-->
        <script src="{{asset('public/backend/dist/vendors/jquery/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/moment/moment.js')}}"></script>
        <script src="{{asset('public/backend/dist/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>    
        <script src="{{asset('public/backend/dist/vendors/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <!-- END: Template JS-->  
    </body>
    <!-- END: Body-->
</html>



























{{-- 
@extends('admin.log_master')
@section('content')
    
<div class="login-box">
    <form class="login-form" method="POST" action="{{ route('admin.login') }}">
        @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Admin Log in</h3>
      <div class="form-group">
        <label class="control-label">EMAIL</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

      </div>
      <div class="form-group">
        <div class="utility">
          <div class="animated-checkbox">
            <label>
              <input type="checkbox" name="remember" id="remember" ><span class="label-text">Remember me</span>
            </label>
          </div>
          
          @if (Route::has('admin.forgot.password'))
          <p class="semibold-text mb-2"><a href="{{ route('admin.forgot.password') }}" >Forgot Password ?</a></p>
           @endif

        </div>
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Log in</button>
      </div>
    </form>

  </div>


@endsection --}}