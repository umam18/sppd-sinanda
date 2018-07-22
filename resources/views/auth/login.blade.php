@extends('layouts.app')

@section('content')
<div class="limiter">
  <div class="container-login100" style="background-color:#0064AB;">
    <div class="wrap-login100">
      <div class="" style="position:absolute; margin-top:-160px; margin-left:-80px;">
        <img src="images/img-02.png" alt="IMG" width="80px" height="80px">
      </div>
      <div class="login100-pic js-tilt" data-tilt>
        <img src="images/img-01.png" alt="IMG">
      </div>

      <form class="login100-form validate-form" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <span class="login100-form-title">
          LOGIN
        </span>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} wrap-input100 validate-input"  data-validate = "Valid email is required: ex@abc.xyz">
          <input class="input100" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
          </span>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} wrap-input100 validate-input" data-validate = "Password is required">
          <input class="input100" id="password" type="password" class="form-control" name="password" required placeholder="Password">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </span>
        </div>

        <div class="checkbox">
            <label class="txt2">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn" type="submit">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
