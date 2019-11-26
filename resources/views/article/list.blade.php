@extends('layouts.app')
@section('title',$category->name)
@section('keywords','枫叶个人博客,枫叶,博客,技术,PHP,JAVA,HTML')
@section('description','枫叶个人博客,记录点滴生活')
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
                    @foreach ($articles as $item)
                        @if($item->is_top===1)
                            <!--置顶设计-->
                            @if($item->cover)
                                <li>
                                    <h3 class="blogtitle"><a href="{{ route('article.show', ['id'=>$item->id]) }}"
                                                             target="_blank"><b>【顶】</b>{{$item->title}}</a></h3>
                                    <span class="blogpic imgscale"><i><a
                                                href="{{ route('article.list', ['category_id'=>$item->categories->id]) }}">{{$item->categories->name}}</a></i><a
                                            href="{{ route('article.show', ['id'=>$item->id]) }}" title=""><img
                                                src="{{$item->cover}}" alt=""></a></span>
                                    <p class="blogtext">{{$item->summary}}</p>
                                    <p class="bloginfo"><i class="avatar"><img
                                                src="/home/images/lqy.jpg"></i><span>枫叶</span><span>{{$item->created_at}}</span><span>【<a
                                                href="{{ route('article.list', ['category_id'=>$item->categories->id]) }}">{{$item->categories->name}}</a>】</span>
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
                                                href="{{ route('article.list', ['category_id'=>$item->categories->id]) }}">{{$item->categories->name}}</a>】</span>
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
                                                href="{{ route('article.list', ['category_id'=>$item->categories->id]) }}">{{$item->categories->name}}</a></i><a
                                            href="{{ route('article.show', ['id'=>$item->id]) }}" title=""><img
                                                src="{{$item->cover}}" alt=""></a></span>
                                    <p class="blogtext">{{$item->summary}}</p>
                                    <p class="bloginfo"><i class="avatar"><img
                                                src="/home/images/lqy.jpg"></i><span>枫叶</span><span>{{$item->created_at}}</span><span>【<a
                                                href="{{ route('article.list', ['category_id'=>$item->categories->id]) }}">{{$item->categories->name}}</a>】</span>
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
                                                href="{{ route('article.list', ['category_id'=>$item->categories->id]) }}">{{$item->categories->name}}</a>】</span>
                                    </p>
                                    <a href="{{ route('article.show', ['id'=>$item->id]) }}" class="viewmore">阅读更多</a>
                                </li>
                                <li>
                            @endif
                        @endif
                    @endforeach
                </ul>
                <!--pagelist-->
                {{$articles->links()}}
            </div>

            <!--bloglist end-->
        </div>
        @include('layouts._rbox')
    </article>
@endsection


