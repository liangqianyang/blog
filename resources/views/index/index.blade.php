@extends('layouts.app')
@section('title','枫叶博客')
@section('keywords','枫叶,博客,枫叶博客,PHP')
@section('description','枫叶博客')
@section('content')
    <article>
        <!--lbox begin-->
        <div class="lbox">
            <!--banbox begin-->
            <div class="banbox">
                <div class="banner">
                    <div id="banner" class="fader">
                        @foreach ($banners as $banner)
                            <li class="slide"><a href="{{$banner->url}}" target="_blank"><img
                                        src="{{$banner->image_url}}" title="{{$banner->title}}"></a></li>
                        @endforeach
                        <div class="fader_controls">
                            <div class="page prev" data-target="prev"></div>
                            <div class="page next" data-target="next"></div>
                            <ul class="pager_list">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--banbox end-->
            <!--headline begin-->
            <div class="headline">
                <ul>
                    <li><a href="/" title="为什么说10月24日是程序员的节日？"><img src="/home/images/h1.jpg"
                                                                    alt="为什么说10月24日是程序员的节日？"><span>为什么说10月24日是程序员的节日？</span></a>
                    </li>
                    <li><a href="/" title="个人网站做好了，百度不收录怎么办？来，看看他们怎么做的"><img src="/home/images/h2.jpg"
                                                                             alt="个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</span></a>
                    </li>
                </ul>
            </div>
            <!--headline end-->
            <div class="clearblank"></div>
            <div class="tab_box whitebg">
                <div class="tab_buttons">
                    <ul>
                        @for ($i = 0; $i < count($categories); $i++)
                            @if ($i == 0)
                                <li class="newscurrent"
                                    data-category_id="{{$categories->get($i)->id}}">{{$categories->get($i)->name}}</li>
                            @else
                                <li data-category_id="{{$categories->get($i)->id}}">{{$categories->get($i)->name}}</li>
                            @endif
                        @endfor
                    </ul>
                </div>
                <div class="newstab">
                    <div class="newsitem">
                        <div class="newspic">
                            <ul>
                                @foreach ($tab['pic'] as $item)
                                    <li><a href="{{ route('article.show', [$item->id]) }}"><img src="{{$item->cover}}"><span>{{$item->title}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <ul class="newslist">
                            @foreach ($tab['list'] as $item)
                                <li><i></i><a href="{{ route('article.show', [$item->id]) }}">{{$item->title}}</a>
                                    <p>{{$item->summary}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--tab_box end-->
            <div class="zhuanti whitebg">
                <h2 class="htitle"><span class="hnav"><a href="/">原创模板</a><a href="/">古典</a><a href="/">清新</a><a
                            href="/">低调</a></span>精彩专题</h2>
                <ul>
                    <li><i class="ztpic"><a href="/" target="_blank"><img src="/home/images/1.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a
                            href="" target="_blank" class="readmore">文章阅读</a></li>
                    <li><i class="ztpic"><a href="/" target="_blank"><img src="/home/images/2.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a
                            href="" target="_blank" class="readmore">文章阅读</a></li>
                    <li><i class="ztpic"><a href="/" target="_blank"><img src="/home/images/3.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a
                            href="" target="_blank" class="readmore">文章阅读</a></li>
                    <li><i class="ztpic"><a href="/" target="_blank"><img src="/home/images/4.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a
                            href="" target="_blank" class="readmore">文章阅读</a></li>
                    <li><i class="ztpic"><a href="/" target="_blank"><img src="/home/images/h2.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a
                            href="" target="_blank" class="readmore">文章阅读</a></li>
                    <li><i class="ztpic"><a href="/" target="_blank"><img src="/home/images/h1.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a
                            href="" target="_blank" class="readmore">文章阅读</a></li>
                </ul>
            </div>
            <div class="ad whitebg"><img src="/home/images/fengjing.jpg"></div>
            <div class="whitebg bloglist">
                <h2 class="htitle">最新博文</h2>
                <ul>
                    <!--多图模式 置顶设计-->
                    <li>
                        <h3 class="blogtitle"><a href="/info.html" target="_blank"><b>【顶】</b>别让这些闹心的套路，毁了你的网页设计!</a>
                        </h3>
                        <span class="bplist"><a href="/"> <img src="/home/images/b02.jpg" alt=""></a> <a href="/"><img
                                    src="/home/images/b03.jpg" alt=""></a> <a href="/"><img src="/home/images/b04.jpg"
                                                                                            alt=""> </a><a href="/"><img
                                    src="/home/images/b05.jpg" alt=""> </a></span>
                        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
                            来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
                        <p class="bloginfo"><i class="avatar"><img src="/home/images/lqy.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a
                                    href="/">原创模板</a>】</span></p>
                    </li>
                    <!--单图-->
                    <li>
                        <h3 class="blogtitle"><a href="/" target="_blank">【个人博客网站制作】自己不会个人博客网站制作，你会选择用什么博客程序源码？</a></h3>
                        <span class="blogpic imgscale"><i><a href="/">原创模板</a></i><a href="/" title=""><img
                                    src="/home/images/b01.jpg" alt=""></a></span>
                        <p class="blogtext">
                            这些开源的博客程序源码，都是经过很多次版本测试的，都有固定的使用人群。我所知道的主流的博客程序有，Z-blog，Emlog，WordPress，Typecho等，免费的cms系统有，织梦cms（dedecms），phpcms，帝国cms（EmpireCMS）！... </p>
                        <p class="bloginfo"><i class="avatar"><img
                                    src="/home/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a
                                    href="/">原创模板</a>】</span></p>
                        <a href="/" class="viewmore">阅读更多</a></li>
                    <li>
                        <h3 class="blogtitle"><a href="/" target="_blank">宝宝个人博客模板-亲子博客模板-宝宝个人网站模板</a></h3>
                        <span class="blogpic imgscale"><i><a href="/">最新模板</a></i><a href="/" title=""><img
                                    src="/home/images/b02.jpg" alt=""></a></span>
                        <p class="blogtext">
                            这是一个记录宝宝成长点滴的个人博客，用作于宝宝博客，亲子博客，都是适用的。颜色为蓝色调，头部有飘动的卡通云，采用css3动画效果，布局简单，代码精简，还有相册功能，发图片，视频，时间轴可记录重要时刻，也可记录宝宝的生长发育状况，也可以统计宝宝博客网站的所有文章... </p>
                        <p class="bloginfo"><i class="avatar"><img
                                    src="/home/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a
                                    href="/">最新模板</a>】</span></p>
                        <a href="/" class="viewmore">阅读更多</a></li>
                    <li>
                        <h3 class="blogtitle"><a href="/" target="_blank">如何快速建立自己的个人博客网站</a></h3>
                        <span class="blogpic imgscale"><i><a href="/">快速建站</a></i><a href="/" title=""><img
                                    src="/home/images/b03.jpg" alt=""></a></span>
                        <p class="blogtext">
                            各大博客门户网站，相继关闭，做一个独立的个人博客网站，那是将来的趋势。越来越多的个人站长倾向于独立建站，有个属于自己的博客网站，那如何快速建立自己的个人博客网站呢，接下来，我就简单给大家介绍一下：以阿里云为例... </p>
                        <p class="bloginfo"><i class="avatar"><img
                                    src="/home/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a
                                    href="/">快速建站</a>】</span></p>
                        <a href="/" class="viewmore">阅读更多</a></li>
                    <li>
                        <h3 class="blogtitle"><a href="/" target="_blank">作为一个设计师,如果遭到质疑你是否能恪守自己的原则?</a></h3>
                        <span class="blogpic imgscale"><i><a href="/">设计制作</a></i><a href="/" title=""><img
                                    src="/home/images/b04.jpg" alt=""></a></span>
                        <p class="blogtext">
                            就拿我自己来说吧，有时候会很矛盾，设计好的作品，不把它分享出来，会觉得待在自己电脑里面实在是没有意义。干脆就发布出去吧。我也害怕收到大家不好的评论，有些评论，可能说者无意，但是对于每一个用心的站长来说，都会受很深的影响，愤怒，恼羞。... </p>
                        <p class="bloginfo"><i class="avatar"><img
                                    src="/home/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a
                                    href="/">设计制作</a>】</span></p>
                        <a href="/" class="viewmore">阅读更多</a></li>
                    <!--纯文字-->
                    <li>
                        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
                        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
                            来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
                        <p class="bloginfo"><i class="avatar"><img
                                    src="/home/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a
                                    href="/">原创模板</a>】</span></p>
                        <a href="/" class="viewmore">阅读更多</a></li>
                    <!--单图-->
                    <li>
                        <h3 class="blogtitle"><a href="/" target="_blank">【个人博客网站制作】自己不会个人博客网站制作，你会选择用什么博客程序源码？</a></h3>
                        <span class="blogpic imgscale"><i><a href="/">原创模板</a></i><a href="/" title=""><img
                                    src="/home/images/b01.jpg" alt=""></a></span>
                        <p class="blogtext">
                            这些开源的博客程序源码，都是经过很多次版本测试的，都有固定的使用人群。我所知道的主流的博客程序有，Z-blog，Emlog，WordPress，Typecho等，免费的cms系统有，织梦cms（dedecms），phpcms，帝国cms（EmpireCMS）！... </p>
                        <p class="bloginfo"><i class="avatar"><img
                                    src="/home/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a
                                    href="/">原创模板</a>】</span></p>
                        <a href="/" class="viewmore">阅读更多</a></li>
                    <li>
                        <h3 class="blogtitle"><a href="/" target="_blank">如何快速建立自己的个人博客网站</a></h3>
                        <span class="blogpic imgscale"><i><a href="/">快速建站</a></i><a href="/" title=""><img
                                    src="/home/images/b03.jpg" alt=""></a></span>
                        <p class="blogtext">
                            各大博客门户网站，相继关闭，做一个独立的个人博客网站，那是将来的趋势。越来越多的个人站长倾向于独立建站，有个属于自己的博客网站，那如何快速建立自己的个人博客网站呢，接下来，我就简单给大家介绍一下：以阿里云为例... </p>
                        <p class="bloginfo"><i class="avatar"><img
                                    src="/home/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a
                                    href="/">快速建站</a>】</span></p>
                        <a href="/" class="viewmore">阅读更多</a></li>
                    <li>
                        <h3 class="blogtitle"><a href="/" target="_blank">【个人博客网站制作】自己不会个人博客网站制作，你会选择用什么博客程序源码？</a></h3>
                        <span class="blogpic imgscale"><i><a href="/">原创模板</a></i><a href="/" title=""><img
                                    src="/home/images/b05.jpg" alt=""></a></span>
                        <p class="blogtext">
                            这些开源的博客程序源码，都是经过很多次版本测试的，都有固定的使用人群。我所知道的主流的博客程序有，Z-blog，Emlog，WordPress，Typecho等，免费的cms系统有，织梦cms（dedecms），phpcms，帝国cms（EmpireCMS）！... </p>
                        <p class="bloginfo"><i class="avatar"><img
                                    src="/home/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a
                                    href="/">原创模板</a>】</span></p>
                        <a href="/" class="viewmore">阅读更多</a>
                    </li>
                    {{--<li>--}}
                    {{--<h3 class="blogtitle"><a href="/" target="_blank">【个人博客网站制作】自己不会个人博客网站制作，你会选择用什么博客程序源码？</a></h3>--}}
                    {{--<span class="blogpic imgscale"><i><a href="/">原创模板</a></i><a href="/" title=""><img src="/home/images/b05.jpg" alt=""></a></span>--}}
                    {{--<p class="blogtext">这些开源的博客程序源码，都是经过很多次版本测试的，都有固定的使用人群。我所知道的主流的博客程序有，Z-blog，Emlog，WordPress，Typecho等，免费的cms系统有，织梦cms（dedecms），phpcms，帝国cms（EmpireCMS）！... </p>--}}
                    {{--<p class="bloginfo"><i class="avatar"><img src="/home/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">原创模板</a>】</span></p>--}}
                    {{--<a href="/" class="viewmore">阅读更多</a>--}}
                    {{--</li>--}}
                </ul>
            </div>
            <!--bloglist end-->
        </div>
        @include('layouts._rbox')
    </article>
@endsection
@section('scriptsAfterJs')
    <script>
        $(document).ready(function () {
            //分类tab切换时触发
            $('.tab_buttons li').click(function () {
                let category_id = $(this).data('category_id')
                $(this).addClass('newscurrent').siblings().removeClass('newscurrent')
                getArticleByCategoryId(category_id);
            });
        });

        /**
         * 根据分类ID获取列表数据
         * @param category_id
         */
        function getArticleByCategoryId(category_id) {
            $.ajax({
                type: "GET",
                url: "{{route('article.category')}}",
                data: {category_id: category_id},
                dataType: "json",
                success: function (data) {
                    let html = ""
                    data.pic.forEach(function (item, index, arr) {
                        html += '<ul>'
                        html += '<li><a href="/"><img src="' + item.cover + '"><span>' + item.title + '</span></a></li>'
                        html += '</ul>'
                    }, data.pic)
                    $(".newstab .newsitem .newspic").html(html)

                    let listHtml = ""
                    data.list.forEach(function (item, index, arr) {
                        listHtml += '<li><i></i><a href="/">' + item.title + '</a>'
                        listHtml += '<p>' + item.summary + '</p>'
                        listHtml += '</li>'
                    }, data.list)
                    $(".newstab .newsitem .newslist").html(listHtml)
                }
            })
        }
    </script>
@endsection
