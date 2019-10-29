<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '登陆页面') - 枫叶博客</title>
    <link rel="stylesheet" type="text/css" href="/home/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/home/css/login.css">
</head>
<body>
<div class="login-box">
    <div class="background">
        <img src="/home/images/login/login.png">
    </div>

    <div class="login-form">
        <p class="title">欢迎来到枫叶博客</p>
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block">
                    <input type="text" name="title" required lay-verify="required" placeholder="请输入用户名"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-block">
                    <input type="password" name="password" required lay-verify="required" placeholder="请输入用户密码"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item" style="margin-left:50px;">
                <div class="layui-input-block">
                    <button class="layui-btn layui-btn-radius layui-btn-normal" lay-submit lay-filter="formDemo">立即登陆</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="/home/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/home/layui/layui.js"></script>
</html>
