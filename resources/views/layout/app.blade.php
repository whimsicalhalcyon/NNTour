<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css'}}">
    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>
    <link rel="stylesheet" href="{{asset('public/main.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    @include('layout.navbar')
    @yield('content')
</body>
</html>
