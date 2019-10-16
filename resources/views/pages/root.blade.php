@extends('layouts.app')
@section('title', '首页')
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

    <script type="text/javascript" src="/home/layui/layui.js"></script>
    <script type="text/javascript">
        layui.config({
            base: '/home/js/util/'
        }).use(['element', 'laypage', 'jquery', 'menu'], function () {
            element = layui.element, laypage = layui.laypage, $ = layui.$, menu = layui.menu;
            laypage.render({
                elem: 'demo'
                , count: 70 //数据总数，从服务端得到
            });
            menu.init();
        })
    </script>
@endsection

