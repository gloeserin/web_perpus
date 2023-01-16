@extends('layout.main')
@section('content')
<div class="wrapper">
<h2>Login</h2>
<form action="/login/auth" method="POST">
    @csrf
  <div class="input-box">
    <input type="text" name="email" placeholder="Enter your email" required>
  </div>
  <div class="input-box">
    <input type="password" name="password" placeholder="Create password" required>
  </div>
  <div class="input-box button">
    <input type="Submit" value="Login Now">
  </div>
</form>
</div>
</div>
@endsection