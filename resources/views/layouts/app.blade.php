<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sifat">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('contents/admin/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin/css')}}/all.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin/css')}}/style.css">
  </head>
  <body>
    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('contents/admin/js')}}/bootstrap.bundle.min.js"></script>
    <script src="{{asset('contents/admin/js')}}/custom.js"></script>
  </body>
</html>
