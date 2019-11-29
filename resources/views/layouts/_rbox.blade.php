<div class="rbox">
    @isset($is_root)
        @if ($is_root === 1)
            @include('layouts._card')
            @include('layouts._notice')
        @endif
    @endisset

    {{--引入点击排行榜--}}
    @include('layouts._ranking')

    {{--引入站长推荐--}}
    @include('layouts._recommend')
    <div class="ad whitebg imgscale">
        <ul>
            <a href="/"><img src="/home/images/ad.jpg"></a>
        </ul>
    </div>

    {{--引入标签云--}}
    @include('layouts._tags')

    {{--引入猜你喜欢--}}
    @include('layouts._likes')

    <div class="ad whitebg imgscale">
        <ul>
            <a href="/"><img src="/home/images/ad02.jpg"></a>
        </ul>
    </div>
    <div class="whitebg tongji">
        <h2 class="htitle">站点信息</h2>
        <ul>
            <li><b>建站时间</b>：2019-12-24</li>
            <li><b>文章统计</b>：{{$article_count}}条</li>
            <li><b>文章评论</b>：{{$article_comments}}条</li>
            <li><b>微信公众号</b>：扫描二维码，关注我</li>
            <img src="/home/images/wxgzh.jpg" class="tongji_gzh">
        </ul>
    </div>

    @isset($is_root)
        @if ($is_root === 1)
            @include('layouts._link')
        @endif
    @endisset

</div>
