@extends('layouts.app')
@section('title', '首页')
@section('banner')
    <div class="banner">
        <div class="layui-carousel" id="test" lay-filter="test">
            <div carousel-item="">
                <div><img src="http://blog.test/home/img/banner.jpg"></div>
                <div><img src="http://blog.test/home/img/banner1.jpg"></div>
                <div><img src="http://blog.test/home/layui/css/modules/layim/skin/3.jpg"></div>
                <div><img src="http://blog.test/home/layui/css/modules/layim/skin/4.jpg"></div>
                <div><img src="http://blog.test/home/layui/css/modules/layim/skin/5.jpg"></div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="cont w1000">
            <div class="title">
                <span class="layui-breadcrumb" lay-separator="|">
                  <a href="javascript:;" class="active">设计文章</a>
                  <a href="javascript:;">前端文章</a>
                  <a href="javascript:;">旅游杂记</a>
                </span>
            </div>
            <div class="list-item">
                <div class="item">
                    <div class="layui-fluid">
                        <div class="layui-row">
                            <div class="layui-col-xs12 layui-col-sm4 layui-col-md5">
                                <div class="img"><img src="/home/img/sy_img1.jpg" alt=""></div>
                            </div>
                            <div class="layui-col-xs12 layui-col-sm8 layui-col-md7">
                                <div class="item-cont">
                                    <h3>空间立体效果图，完美呈现最终效果
                                        {{--<button class="layui-btn layui-btn-danger new-icon">new</button>--}}
                                    </h3>
                                    <h5>设计文章</h5>
                                    <p>
                                        室内设计作为一门新兴的学科，尽管还只是近数十年的事，但是人们有意识地对自己生活、生产活动的室内进行安排布置，甚至美化装饰，赋予室内环境以所祈使的气氛，却早巳从人类文明伊始的时期就已存在</p>
                                    <a href="{:url('/article/detail')}" class="go-icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="layui-fluid">
                        <div class="layui-row">
                            <div class="layui-col-xs12 layui-col-sm4 layui-col-md5">
                                <div class="img"><img src="/home/img/sy_img2.jpg" alt=""></div>
                            </div>
                            <div class="layui-col-xs12 layui-col-sm8 layui-col-md7">
                                <div class="item-cont">
                                    <h3>空间立体效果图，完美呈现最终效果
                                        <button class="layui-btn layui-btn-danger new-icon">new</button>
                                    </h3>
                                    <h5>设计文章</h5>
                                    <p>
                                        室内设计作为一门新兴的学科，尽管还只是近数十年的事，但是人们有意识地对自己生活、生产活动的室内进行安排布置，甚至美化装饰，赋予室内环境以所祈使的气氛，却早巳从人类文明伊始的时期就已存在</p>
                                    <a href="{:url('/article/detail')}" class="go-icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="layui-fluid">
                        <div class="layui-row">
                            <div class="layui-col-xs12 layui-col-sm4 layui-col-md5">
                                <div class="img"><img src="/home/img/sy_img3.jpg" alt=""></div>
                            </div>
                            <div class="layui-col-xs12 layui-col-sm8 layui-col-md7">
                                <div class="item-cont">
                                    <h3>空间立体效果图，完美呈现最终效果
                                        <button class="layui-btn layui-btn-danger new-icon">new</button>
                                    </h3>
                                    <h5>设计文章</h5>
                                    <p>
                                        室内设计作为一门新兴的学科，尽管还只是近数十年的事，但是人们有意识地对自己生活、生产活动的室内进行安排布置，甚至美化装饰，赋予室内环境以所祈使的气氛，却早巳从人类文明伊始的时期就已存在</p>
                                    <a href="{:url('/article/detail')}" class="go-icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="layui-fluid">
                        <div class="layui-row">
                            <div class="layui-col-xs12 layui-col-sm4 layui-col-md5">
                                <div class="img"><img src="/home/img/sy_img4.jpg" alt=""></div>
                            </div>
                            <div class="layui-col-xs12 layui-col-sm8 layui-col-md7">
                                <div class="item-cont">
                                    <h3>空间立体效果图，完美呈现最终效果
                                        <button class="layui-btn layui-btn-danger new-icon">new</button>
                                    </h3>
                                    <h5>设计文章</h5>
                                    <p>
                                        室内设计作为一门新兴的学科，尽管还只是近数十年的事，但是人们有意识地对自己生活、生产活动的室内进行安排布置，甚至美化装饰，赋予室内环境以所祈使的气氛，却早巳从人类文明伊始的时期就已存在</p>
                                    <a href="{:url('/article/detail')}" class="go-icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="layui-fluid">
                        <div class="layui-row">
                            <div class="layui-col-xs12 layui-col-sm4 layui-col-md5">
                                <div class="img"><img src="/home/img/sy_img5.jpg" alt=""></div>
                            </div>
                            <div class="layui-col-xs12 layui-col-sm8 layui-col-md7">
                                <div class="item-cont">
                                    <h3>空间立体效果图，完美呈现最终效果
                                        <button class="layui-btn layui-btn-danger new-icon">new</button>
                                    </h3>
                                    <h5>设计文章</h5>
                                    <p>
                                        室内设计作为一门新兴的学科，尽管还只是近数十年的事，但是人们有意识地对自己生活、生产活动的室内进行安排布置，甚至美化装饰，赋予室内环境以所祈使的气氛，却早巳从人类文明伊始的时期就已存在</p>
                                    <a href="{:url('/article/detail')}" class="go-icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="demo" style="text-align: center;"></div>
        </div>
    </div>
@endsection

@section('scriptsAfterJs')
    <script type="text/javascript">
        $(function () {

            $(".layui-breadcrumb a").each(function (index) {
                $(this).click(function () {
                    $(".layui-breadcrumb a").removeClass('active')
                    $(".layui-breadcrumb a").eq(index).addClass('active')
                })
            })
        });

        let scrWidth = window.screen.width;
        layui.config({
            base: '/home/js/util/'
        }).use(['element', 'laypage', 'jquery', 'menu'], function () {
            element = layui.element, laypage = layui.laypage, $ = layui.$, menu = layui.menu;
            if (scrWidth > 1024) {
                laypage.render({
                    elem: 'demo'
                    , groups: 5
                    , count: 70 //数据总数，从服务端得到
                });
            } else {
                laypage.render({
                    elem: 'demo'
                    , groups: 3
                    , count: 70 //数据总数，从服务端得到
                });
            }
            menu.init();
        })

        layui.use(['carousel'], function () {
            var carousel = layui.carousel
            //改变下时间间隔、动画类型、高度
            //常规轮播
            if (scrWidth > 1024) {
                carousel.render({
                    elem: '#test'
                    , arrow: 'hover'
                    , indicator: 'none'
                    , width: '100%'
                    , height: '440px'
                    , interval: 3000
                });
            }
            else {
                carousel.render({
                    elem: '#test'
                    , arrow: 'hover'
                    , indicator: 'none'
                    , width: '100%'
                    , height: '170px'
                    , interval: 3000
                });
            }

        });
    </script>
@endsection
