<header id="header">
    <div class="navbox">
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <div class="logo"><a href="/">枫叶个人博客</a></div>
        <nav>
            <ul id="starlist">
                <li><a href="/">首页</a></li>
                @foreach ($navs as $nav)
                    <li><a href="{{$nav->url}}">
                            {{$nav->name}}</a>
                        @if (!empty($nav->children))
                            <ul class="sub">
                                @foreach ($nav->children as $item)
                                    <li><a href="{{$item->url}}">{{$item->name}}</a></li>
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
