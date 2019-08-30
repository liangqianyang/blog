<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '首页') - 枫叶博客</title>
    <!-- 样式 -->
    <link rel="stylesheet" type="text/css" href="/home/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/home/css/main.css">
    <!--加载meta IE兼容文件-->
    <!--[if lt IE 9]>
    <script src="/home/js/html5shiv.js"></script>
    <script src="/home/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('layouts._header')
@include('layouts.__banner')
@yield('content')
@include('layouts._footer')
@yield('scriptsAfterJs')
</body>
</html>
