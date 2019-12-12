@extends('layouts.app')
@section('title','关于我')
@section('keywords','关于我')
@section('description','关于我')
@section('content')
    <article>
        <div class="whitebg about">
            <div class="ab_box"> <i class="avatar_pic"><img src="{{$info['avatar']}}"></i>
                <h3>{{$info['real_name']}}</h3>
                <p>{{$info['summary']}}</p>
            </div>
            <h2 class="gd_title">内心独白</h2>
            <p class="ab_dubai">{{$info['description']}}</p>
            <span class="ly_button"><a href="/message.html" target="_blank">留言</a></span>
            <h2 class="gd_title">作者推荐</h2>
            <ul class="xinlu">
                @foreach ($articles as $item)
                    <li><a href="{{ route('article.show', ['id'=>$item->id]) }}" target="_blank">
                            <i>
                                <img src="{{$item->cover}}">
                            </i>
                            <p>{{$item->title}}</p>
                            <span>{{$item->summary}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </article>
@endsection
