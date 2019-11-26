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
                    @foreach ($top_articles as $item)
                        <li>
                            <a href="{{ route('article.show', ['id'=>$item->id]) }}" title="{{$item->title}}">
                                <img src="{{$item->cover}}" alt="{{$item->title}}">
                                <span>{{$item->title}}</span>
                            </a>
                        </li>
                    @endforeach
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
                                    <li><a href="{{ route('article.show', ['id'=>$item->id]) }}"><img
                                                src="{{$item->cover}}"><span>{{$item->title}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <ul class="newslist">
                            @foreach ($tab['list'] as $item)
                                <li><i></i><a href="{{ route('article.show', ['id'=>$item->id]) }}">{{$item->title}}</a>
                                    <p>{{$item->summary}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--tab_box end-->
            <div class="zhuanti whitebg">
                <h2 class="htitle">
                    <span class="hnav">
                        @foreach ($labels as $item)
                            <a href="{{ route('article.labels', ['id'=>$item->id]) }}">{{$item->title}}</a>
                        @endforeach
                    </span>
                    精彩专题</h2>
                <ul>
                    @foreach ($special_articles as $item)
                        <li>
                            <i class="ztpic">
                                <a href="{{ route('article.show', ['id'=>$item->id]) }}" target="_blank"><img
                                        src="{{$item->cover}}"></a>
                            </i>
                            <b>{{$item->title}}</b>
                            <span>{{$item->summary}}</span>
                            <a href="{{ route('article.show', ['id'=>$item->id]) }}" target="_blank" class="readmore">文章阅读</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="ad whitebg"><img src="/home/images/fengjing.jpg"></div>
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
