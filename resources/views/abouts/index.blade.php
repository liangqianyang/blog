@extends('layouts.app')
@section('title', '关于枫叶')
@section('content')
    <div class="about-content">
        <div class="w1000">
            <div class="item info">
                <div class="title">
                    <h3>我的介绍</h3>
                </div>
                <div class="cont">
                    <img src="/home/img/xc_img1.jpg">
                    <div class="per-info">
                        <p>
                            <span class="name">枫叶</span><br/>
                            <span class="age">27岁</span><br/>
                            <span class="Career">PHP工程师</span><br/>
                            <span class="interest">爱好动漫,游戏,旅游</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/home/layui/layui.js"></script>
    <script type="text/javascript">
        layui.config({
            base: '/home/js/util/'
        }).use(['element', 'laypage', 'form', 'layer', 'menu'], function () {
            element = layui.element, laypage = layui.laypage, form = layui.form, layer = layui.layer, menu = layui.menu;
            menu.init();
        })
    </script>
@endsection
