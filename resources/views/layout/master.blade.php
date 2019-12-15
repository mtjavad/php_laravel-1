<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/my.css">
    <script src="/js/app.js"></script>
    <script src="/js/jquery-3.3.1.slim.min.js"></script>
    <title>آموزشی</title>
</head>
<body>
@include('layout.nav')
<div class="container">
    <div class="row mt-5">
        <div class="offset-2"></div>
        <div class="col-md-8">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>