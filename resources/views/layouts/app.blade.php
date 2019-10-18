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
    <script type="text/javascript" src="/home/js/jquery-2.1.4.min.js"></script>
    <![endif]-->
</head>
<body>
@include('layouts._header')
@yield('banner')
@yield('content')
@include('layouts._footer')


<div id="top" class="top"></div>
<script>
    $(function () {
        //获取页面可视区高度
        let clientHeight = document.documentElement.clientHeight;
        $(window).scroll(function () {
            if ($(window).scrollTop() > clientHeight) {
                $('#top').css('display', 'block')
            } else {
                $('#top').css('display', 'none')
            }
        })

        $('#top').click(function () {
            $('body,html').animate({scrollTop: 0}, 500);
            return false
        })
    })
</script>

<script type="text/javascript">
    layui.use(['layim'], function (layim) {
        //基础配置
        layim.config({
            init: {
                //我的信息
                "mine": {
                    "username": "纸飞机" //我的昵称
                    , "id": "100000" //我的ID
                    , "status": "online" //在线状态 online：在线、hide：隐身
                    , "avatar": "http://blog.test/home/layui/css/modules/layim/skin/2.jpg" //好友头像
                    , "sign": "在深邃的编码世界，做一枚轻盈的纸飞机" //我的签名
                }
                , //好友列表
                "friend": [{
                    "groupname": "前端码屌" //好友分组名
                    , "id": 1 //分组ID
                    , "list": [{ //分组下的好友列表
                        "username": "贤心" //好友昵称
                        , "id": "100001" //好友ID
                        , "avatar": "http://blog.test/home/layui/css/modules/layim/skin/2.jpg" //好友头像
                        , "sign": "这些都是测试数据，实际使用请严格按照该格式返回" //好友签名
                        , "status": "online" //若值为offline代表离线，online或者不填为在线
                    }]
                }]
            } //获取主面板列表信息，下文会做进一步介绍
            , title: "即时通讯"
            , right: "5px"

            //获取群员接口（返回的数据格式见下文）
            , members: {
                url: '' //接口地址（返回的数据格式见下文）
                , type: 'get' //默认get，一般可不填
                , data: {} //额外参数
            }

            //上传图片接口（返回的数据格式见下文），若不开启图片上传，剔除该项即可
            , uploadImage: {
                url: '' //接口地址
                , type: 'post' //默认post
            }

            //上传文件接口（返回的数据格式见下文），若不开启文件上传，剔除该项即可
            , uploadFile: {
                url: '' //接口地址
                , type: 'post' //默认post
            }
            //扩展工具栏，下文会做进一步介绍（如果无需扩展，剔除该项即可）
            , tool: [{
                alias: 'code' //工具别名
                , title: '代码' //工具名称
                , icon: '&#xe64e;' //工具图标，参考图标文档
            }]

            , msgbox: layui.cache.dir + 'css/modules/layim/html/msgbox.html' //消息盒子页面地址，若不开启，剔除该项即可
            , find: layui.cache.dir + 'css/modules/layim/html/find.html' //发现页面地址，若不开启，剔除该项即可
            , chatLog: layui.cache.dir + 'css/modules/layim/html/chatlog.html' //聊天记录页面地址，若不开启，剔除该项即可
        });
    });
</script>
@yield('scriptsAfterJs')
</body>
</html>
