<div class="header">
    <div class="menu-btn">
        <div class="menu"></div>
    </div>
    <h1 class="logo">
        <a href="{{ url('/') }}">
            <img src="/home/img/logo.png">
        </a>
    </h1>
    <div class="nav">
        <a href="{{ url('/') }}" class="article active">文章</a>
        <a href="{{ route('whisper') }}" class="whisper">微语</a>
        <a href="{{ route('leacots') }}" class="leacots">留言</a>
        <a href="{{ route('album') }}" class="album">相册</a>
        <a href="{{ route('about') }}" class="about">关于</a>
    </div>
    <ul class="layui-nav header-down-nav">
        <li class="layui-nav-item"><a href="{{ url('/') }}" class="active">文章</a></li>
        <li class="layui-nav-item"><a href="{{ route('whisper') }}" class="whisper">微语</a></li>
        <li class="layui-nav-item"><a href="{{ route('leacots') }}" class="leacots">留言</a></li>
        <li class="layui-nav-item"><a href="{{ route('album') }}" class="album">相册</a></li>
        <li class="layui-nav-item"><a href="{{ route('about') }}" class="about">关于</a></li>
    </ul>
    <p class="welcome-text">
        欢迎来到<span class="name">枫叶</span>博客~
    </p>
</div>

<script type="text/javascript" src="/home/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/home/layui/layui.js"></script>
<script>
    $(function () {
        let nav_name = "{{$nav_name}}"
        $("." + nav_name).addClass('active').siblings().removeClass('active');
    });
</script>
