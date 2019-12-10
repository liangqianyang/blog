@extends('layouts.app')
@section('title','时间轴')
@section('keywords','时间轴,枫叶,PHP,博客,JAVA,技术')
@section('description','时间轴,记录往期发表的文章')
@section('content')
    <article>
        <div class="whitebg timebox">
            <h2 class="htitle">往期文章</h2>
            <ul id="list">
                @foreach($articles as $item)
                    <li>
                        <span>{{$item->created_at->format('Y-m-d')}}</span>
                        <i><a href="{{ route('article.show', ['id'=>$item->id]) }}" target="_blank">{{$item->title}}</a></i>
                    </li>
                @endforeach
            </ul>
            <ul id="list2">
            </ul>
            <div class="clear"></div>
            {{$articles->links()}}
        </div>
    </article>
@endsection

