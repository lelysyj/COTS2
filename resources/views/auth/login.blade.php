@extends('layouts.app')
@section('content')
<h3>Login</h3>
@if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
<form method="POST" action="{{ url('login') }}">
  @csrf
  <div class="mb-3">
    <input name="username" class="form-control" placeholder="username" value="{{ old('username') }}">
    @error('username') <div class="text-danger">{{ $message }}</div> @enderror
  </div>
  <div class="mb-3">
    <input type="password" name="password" class="form-control" placeholder="password">
    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
  </div>
  @error('login') <div class="text-danger">{{ $message }}</div> @enderror
  <button class="btn btn-primary">Login</button>
</form>
@endsection