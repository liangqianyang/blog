@extends('layouts.app')
@section('title','文章详情')
@section('keywords','文章详情')
@section('description','文章详情')
@section('content')
    <article>
        <!--lbox begin-->
        <div class="lbox">
            <div class="content_box whitebg">
                <h2 class="htitle"><span class="con_nav">您现在的位置是：<a href="/">网站首页</a>><a
                            href="/">{{$article->categories->get(0)->name}}</a></span>{{$article->categories->get(0)->name}}
                </h2>
                <h1 class="con_tilte">{{$article->title}}</h1>
                <p class="bloginfo"><i class="avatar"><img
                            src="/home/images/lqy.jpg"></i><span>枫叶</span><span>{{$article->created_at}}</span><span>【<a
                            href="/">{{$article->categories->get(0)->name}}</a>】</span><span>{{$article->clicks}}
                        人已围观</span></p>
                <p class="con_info"><b>简介</b>{{$article->summary}}</p>
                <div class="con_text">
                    {!! $article->content !!}
                    <p><span class="diggit" onclick="likes({{$article->id}})"><span>❤</span> 很赞哦！ <span
                                id="likes">({{$article->likes}})</span></span>
                    </p>
                    <div class="nextinfo">
                        @if (!empty($prev))
                            <p>上一篇：<a href="{{ route('article.show', ['id'=>$prev->id]) }}">{{$prev->title}}</a></p>
                        @else
                            <p>上一篇：<a href="javascript:;">这是第一篇</a></p>
                        @endif

                        @if (!empty($next))
                            <p>下一篇：<a href="{{ route('article.show', ['id'=>$next->id]) }}">{{$next->title}}</a></p>
                        @else
                            <p>下一篇：<a href="javascript:;">这是最后一篇</a></p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="whitebg">
                <h2 class="htitle">相关文章</h2>
                <ul class="otherlink">
                    @foreach ($relates as $item)
                        <li><a href="{{ route('article.show', ['id'=>$item->id]) }}"
                               title="{{$item->title}}">{{$item->title}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="whitebg gbook">
                <h2 class="htitle">文章评论</h2>
                <ul id="comment_list">
                    @foreach ($comments as $item)
                        <div class="fb">
                            <ul>
                                <p class="fbtime"><span>{{$item->created_at}}</span>{{$item->username}}</p>
                                <p class="fbinfo">{{$item->content}}</p>
                            </ul>
                        </div>
                    @endforeach

                    <form action="" method="post" name="saypl" id="saypl" onsubmit="return CheckPl(document.saypl)">
                        <div id="plpost">
                            <p class="saying"><span><a href="javascript:;">共有<span
                                            id="comments_count">{{count($comments)}}</span>条评论</a></span>来说两句吧...
                            </p>
                            <p class="yname"><span>用户名:</span>
                                <input name="username" id="username" type="text" class="inputText" value="" size="16"/>
                            </p>
                            <p class="yzm"><span>验证码:</span>
                                <input name="captcha" id="captcha" type="text" class="inputText" size="16"/>
                                <img src="{{route('article.captcha')}}" align="absmiddle" name="plKeyImg" id="plKeyImg"
                                     onclick="this.src='{{route('article.captcha')}}?v='+Math.random()"
                                     title="看不清楚,点击刷新"/></p>
                            <textarea name="content" rows="6" id="saytext"></textarea>
                            <input name="id" type="hidden" id="id" value="{{$article->id}}"/>
                            <input type="submit" value="提交"/>
                            </td>
                        </div>
                    </form>
                </ul>
            </div>
        </div>
        <!--lbox end-->
        @include('layouts._rbox')
    </article>
@endsection
@section('scriptsAfterJs')
    <script>
        $(document).ready(function () {

        });


        /**
         *点赞
         * @param id
         */
        function likes(id) {
            $.ajax({
                type: "POST",
                url: "{{route('article.likes')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {id: id},
                dataType: "json",
                success: function (data) {
                    if (data.code == 0) {
                        $('#likes').html(data.likes)
                        alert(data.message)
                    } else {
                        alert(data.message)
                    }
                }
            })
        }

        function CheckPl(obj) {
            let username = obj.username.value
            let captcha = obj.captcha.value
            let saytext = obj.saytext.value
            if (username == "") {
                alert("留个姓名吧");
                obj.username.focus();
                return false;
            }

            if (captcha == "") {
                alert("请输入验证码");
                obj.captcha.focus();
                return false;
            }

            if (saytext == "") {
                alert("您没什么话要说吗？");
                obj.saytext.focus();
                return false;
            }

            $.ajax({
                type: "POST",
                url: "{{route('article.comment')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: obj.id.value,
                    username: username,
                    captcha: captcha,
                    content: saytext
                },
                dataType: "json",
                success: function (data) {
                    if (data.code == 0) {
                        let html = ""
                        html += '<div class=\"fb\">'
                        html += '<ul>'
                        html += '<p class=\"fbtime\"><span>' + new Date().toLocaleString() + '</span>' + username + '</p>'
                        html += '<p class=\"fbinfo\">' + saytext + '</p>'
                        html += '</ul>'
                        html += '</div>'
                        $('#comment_list').prepend(html)
                        $('#comments_count').html(parseInt($('#comments_count').text()) + 1)
                        obj.username.value = ''
                        obj.captcha.value = ''
                        obj.saytext.value = ''
                        alert(data.message)
                    } else {
                        alert(data.message)
                    }
                }
            })
            return false;
        }
    </script>
@endsection

