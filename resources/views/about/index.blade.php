@extends('layouts.app')
@section('title','关于我')
@section('keywords','关于我')
@section('description','关于我')
@section('content')
    <article>
        <div class="whitebg about">
            <div class="ab_box"> <i class="avatar_pic"><img src="/home/images/lqy.jpg"></i>
                <h3>梁前扬</h3>
                <p>一个90后的快乐宅男！PHP工程师、JAVA工程师、WEB工程师。</p>
            </div>
            <h2 class="gd_title">内心独白</h2>
            <p class="ab_dubai">我叫枫叶，是一个90后的当代社会好青年，哈哈哈哈！爱好动漫，羽毛球，摄影(正在学习中)。16年入行，一边工作一边积累经验，喜欢研究一些技术，偶尔会去逛逛一些论坛去问一些问题，碰到自己会的也会回答一些提问。其实想做一个自己的个人博客已经很久了。刚出来工作的时候,技术能力也不是很强,只会写代码,服务器方面的知识基本为零,也就没有去写这个博客了。身为一个技术人员总想着能有一个自己的博客，可以分享经验，记录自己的一些生活经历,也可以上传一些图片，总之就是想打造一个自己心里的一个温馨的空间吧。由于自己主要是做后端的，对于前端的知识只是有个基础的了解，偶然的情况下发现了这套模板，发现挺符合自己心里的预期,就开始了搭积木的过程。到现在主要开发已经写完了，往后会在这上面分享一些技术经验,杂志摘抄，散文诗集，精彩图文，喜欢这个空间可以越来越丰富。也欢迎大家留言提出意见，积极改进，越做越好!</p>
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
