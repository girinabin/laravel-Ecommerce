<link rel="stylesheet" href="{{ asset('cd-admin/creatu/css/login.css') }}">

@extends('layouts.app')

@section('content')
<div class="container">
    

<h1 class="text-right">Ecommerce</h1>

<form action="{{ route('login') }}" method="POST">
    @csrf
<div class="login-box">
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user icn"></i>
    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" required >
    @error('email')
     <span class="invalid-feedback" role="alert">
     <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="textbox">
    <i class="fas fa-lock icn"></i>
    <input type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" name="password" required>

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

  </div>

  <button type="submit" class="btn">{{ __('Login') }}</button>
</div>
</form>
</div>
@endsection
