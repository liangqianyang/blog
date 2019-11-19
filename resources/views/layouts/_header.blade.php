<header id="header">
    <div class="navbox">
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <div class="logo"><a href="/index.html">枫叶个人博客</a></div>
        <nav>
            <ul id="starlist">
                <li><a href="/index.html">首页</a></li>
                {{--<li><a href="list.html">个人博客日记</a></li>--}}
                {{--<li class="menu"><a href="list2.html">博客网站制作</a>--}}
                {{--<ul class="sub">--}}
                {{--<li><a href="/6">推荐工具</a></li>--}}
                {{--<li><a href="/7">JS经典实例</a></li>--}}
                {{--<li><a href="/8">网站建设</a></li>--}}
                {{--<li><a href="/7">CSS3|Html5</a></li>--}}
                {{--<li><a href="/8">心得笔记</a></li>--}}
                {{--</ul>--}}

                {{--</li>--}}
                {{--<li><a href="list3.html">网页设计心得</a></li>--}}


                @foreach ($navs as $nav)
                    <li><a href="#">
                            {{$nav->name}}</a>
                        @if (!empty($nav->children))
                            <ul class="sub">
                                @foreach ($nav->children as $item)
                                    <li><a href="#">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                @foreach ($pages as $page)
                    <li><a href="{{$page->url}}">{{$page->title}}</a></li>
                @endforeach
            </ul>
        </nav>
        <div class="searchico"></div>
    </div>
</header>
