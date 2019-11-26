@extends('layouts.app')
@section('title','个人博客日记')
@section('keywords','个人博客日记')
@section('description','个人博客日记')
@section('content')
    <article>
        <!--lbox begin-->
        <div class="lbox">
            <div class="whitebg lanmu"><img src="{{$category->image}}">
                <h1>{{$category->name}}</h1>
                <p>{{$category->summary}}</p>
            </div>
            <div class="whitebg bloglist">
                <h2 class="htitle">最新博文</h2>
                <ul>
                    <!--置顶设计-->
                    @foreach ($articles as $item)
                        @if($item->is_top===1)
                            @if($item->cover)
                                <li>
                                    <h3 class="blogtitle"><a href="{{ route('article.show', ['id'=>$item->id]) }}"
                                                             target="_blank"><b>【顶】</b>{{$item->title}}</a></h3>
                                    <span class="blogpic imgscale"><i><a
                                                href="/article.html?cid={{$item->categories->id}}">{{$item->categories->name}}</a></i><a
                                            href="{{ route('article.show', ['id'=>$item->id]) }}" title=""><img
                                                src="{{$item->cover}}" alt=""></a></span>
                                    <p class="blogtext">{{$item->summary}}</p>
                                    <p class="bloginfo"><i class="avatar"><img
                                                src="/home/images/lqy.jpg"></i><span>枫叶</span><span>{{$item->created_at}}</span><span>【<a
                                                href="/article.html?cid={{$item->categories->id}}">{{$item->categories->name}}</a>】</span>
                                    </p>
                                    <a href="{{ route('article.show', ['id'=>$item->id]) }}" class="viewmore">阅读更多</a>
                                </li>
                                </li>
                            @else
                                <li>
                                    <h3 class="blogtitle"><a href="{{ route('article.show', ['id'=>$item->id]) }}"
                                                             target="_blank"><b>【顶】</b>{{$item->title}}</a></h3>
                                    <p class="blogtext">{{$item->summary}}</p>
                                    <p class="bloginfo"><i class="avatar"><img
                                                src="/home/images/lqy.jpg"></i><span>枫叶</span><span>{{$item->created_at}}</span><span>【<a
                                                href="/article.html?cid={{$item->categories->id}}">{{$item->categories->name}}</a>】</span>
                                    </p>
                                    <a href="/" class="viewmore">阅读更多</a></li>
                                <li>
                            @endif
                        @else
                            @if($item->cover)
                                <li>
                                    <h3 class="blogtitle"><a href="{{ route('article.show', ['id'=>$item->id]) }}"
                                                             target="_blank">{{$item->title}}</a></h3>
                                    <span class="blogpic imgscale"><i><a
                                                href="/article.html?cid={{$item->categories->id}}">{{$item->categories->name}}</a></i><a
                                            href="{{ route('article.show', ['id'=>$item->id]) }}" title=""><img
                                                src="{{$item->cover}}" alt=""></a></span>
                                    <p class="blogtext">{{$item->summary}}</p>
                                    <p class="bloginfo"><i class="avatar"><img
                                                src="/home/images/lqy.jpg"></i><span>枫叶</span><span>{{$item->created_at}}</span><span>【<a
                                                href="/article.html?cid={{$item->categories->id}}">{{$item->categories->name}}</a>】</span>
                                    </p>
                                    <a href="{{ route('article.show', ['id'=>$item->id]) }}" class="viewmore">阅读更多</a>
                                </li>
                            @else
                                <li>
                                    <h3 class="blogtitle"><a href="{{ route('article.show', ['id'=>$item->id]) }}"
                                                             target="_blank">{{$item->title}}</a></h3>
                                    <p class="blogtext">{{$item->summary}}</p>
                                    <p class="bloginfo"><i class="avatar"><img
                                                src="/home/images/lqy.jpg"></i><span>枫叶</span><span>{{$item->created_at}}</span><span>【<a
                                                href="/article.html?cid={{$item->categories->id}}">{{$item->categories->name}}</a>】</span>
                                    </p>
                                    <a href="{{ route('article.show', ['id'=>$item->id]) }}" class="viewmore">阅读更多</a>
                                </li>
                                <li>
                            @endif
                        @endif
                    @endforeach
                </ul>
                <!--pagelist-->
                <div class="pagelist"><a title="Total record">&nbsp;<b>67</b> </a>&nbsp;&nbsp;&nbsp;<b>1</b>&nbsp;<a
                        href="/download/index_2.html">2</a>&nbsp;<a href="/download/index_3.html">3</a>&nbsp;<a
                        href="/download/index_2.html">下一页</a>&nbsp;<a href="/download/index_3.html">尾页</a></div>
                <!--pagelist end-->
            </div>

            <!--bloglist end-->
        </div>
        @include('layouts._rbox')
    </article>
@endsection
