@extends('layouts.app')
@section('title','公告详情')
@section('keywords','公告详情')
@section('description','公告详情')
@section('content')
    <article>
        <!--lbox begin-->
        <div class="lbox">
            <div class="content_box whitebg">
                <h2 class="htitle"><span class="con_nav">您现在的位置是：<a href="/">网站首页</a>>公告详情</span>网站公告
                </h2>
                <h1 class="con_tilte">网站公告</h1>
                <p class="bloginfo"><i class="avatar"><img src="/home/images/lqy.jpg"></i><span>枫叶</span><span>{{$info->created_at}}</span><span style="color: #096">【网站公告】</span></p>
                <div class="con_text">
                    {!! $info->content !!}
                </div>
            </div>
            <div class="whitebg">
                <h2 class="htitle">所有公告</h2>
                <ul class="otherlink">
                    @foreach ($notices as $notice)
                        <li><a href="{{ route('notice.show', [$notice->id]) }}" title="{{$notice->title}}">{{$notice->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--lbox end-->
        @include('layouts._rbox')
    </article>
@stop
