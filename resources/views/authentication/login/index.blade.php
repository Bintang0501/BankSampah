<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Login | Bank Sampah </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  @include("authentication.layouts.css.style")

  <style>
    .border-red {
      border: 1px solid red;
    }
  </style>
  
</head>
<body class="hold-transition login-page">
  <div class="login-box">

    @if (session("message_success"))
      {{ session("message_success") }}
    @elseif(session("message_error"))
    <div class="alert alert-danger">
      {{ session("message_error") }}
    </div>
    @endif

    <div class="login-logo">
      <a href="{{ url('/login') }}">
        <b>Bank Sampah</b>
      </a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
      
      <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="form-group has-feedback">
          <input type="email" class="form-control @error("email") {{ 'border-red' }} @enderror " name="email" placeholder="Masukkan E-Mail" value="{{ old('email') }}">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @error("email")
            <span class="text-danger">
              {{ $message }}
            </span>
          @enderror
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control @error("password") {{ 'border-red' }} @enderror" name="password" placeholder="Masukkan Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @error("password")
            <span class="text-danger">
              {{ $message }}
            </span>
          @enderror
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
              Login
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  @include("authentication.layouts.js.style")
  
</body>
</html>
