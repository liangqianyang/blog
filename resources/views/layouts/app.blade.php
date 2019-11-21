<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', '枫叶博客') -枫叶个人博客</title>
    <meta name="keywords" content=" @yield('keywords','枫叶,博客,枫叶博客,PHP,技术')" />
    <meta name="description" content="@yield('description','枫叶博客')" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/home/css/base.css" rel="stylesheet">
    <link href="/home/css/m.css" rel="stylesheet">
    <script src="/home/js/jquery-1.8.3.min.js" ></script>
    <script src="/home/js/common.js"></script>
    <script src="/home/js/page.js"></script>
    <!--[if lt IE 9]>
    <script src="/home/js/modernizr.js"></script>
    <![endif]-->
</head>
<body>
<!--top begin-->
@include('layouts._header')
@include('layouts._search')
<!--top end-->
@yield('content')
@include('layouts._footer')
@yield('scriptsAfterJs')
</body>
</html>
