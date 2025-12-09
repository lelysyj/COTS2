<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title','Products')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">MyStore</a>
    <div>
      <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary">Products</a>
    </div>
  </div>
</nav>
<div class="container">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @yield('content')
</div>
</body>
</html>