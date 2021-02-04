@extends('admin.log_master')
@section('content')

      <div class="login-box">
        <form class="login-form" method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
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
            <div class="utility">

              @if (Route::has('admin.login'))
              <p class="semibold-text mb-2"><a href="{{ route('admin.login') }}" >Back to login ?</a></p>
               @endif

            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Send Reset Link</button>
          </div>
        <!--Reset email send or not? message-->
        @if (session('status'))
                    <div class="alert alert-success mt-1" role="alert">
                        {{ session('status') }}
                    </div>
        @endif 
        </form>
      </div>

      
@endsection

