@extends('layouts.app')
@section('title','留言')
@section('keywords','留言,枫叶博客,PHP,JAVA')
@section('description','留言')
@section('content')
    <article>
        <div class="whitebg">
            <h2 class="htitle">留言</h2>
            <div class="news_infos m20">
                <div class="gbox">
                    <form action="" method="post" name="message" id="message"
                          onsubmit="return CheckLeaving(document.message)">
                        <p><strong>来说点儿什么吧...</strong></p>
                        <p><span> 您的姓名:</span>
                            <input name="username" type="text" id="username" class="inputText"/>
                            <span class="important">*</span>
                        </p>
                        <p class="yzm"><span>验证码&nbsp;:</span>
                            <input name="captcha" id="captcha" type="text" class="inputText" size="16"/>
                            <span class="important">*</span>
                            <img src="{{route('message.captcha')}}" align="absmiddle" name="captcha" id="captcha"
                                 onclick="this.src='{{route('message.captcha')}}?v='+Math.random()"
                                 title="看不清楚,点击刷新"/></p>
                        <p><span>选择头像 <span class="important">*</span>:</span></p>
                        <p><i>
                                <input type="radio" value="/home/images/tx1.jpg" id="1" name="mycall"
                                       style="display:none" selected>
                                <img id="a" src="/home/images/tx/tx1.jpg " onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value="/home/images/tx/tx2.jpg" id="2" name="mycall"
                                       style="display:none">
                                <img id="b" src="/home/images/tx/tx2.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value=" /home/images/tx/tx3.jpg" id="3" name="mycall"
                                       style="display:none">
                                <img id="c" src="/home/images/tx/tx3.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value=" /home/images/tx/tx4.jpg" id="4" name="mycall"
                                       style="display:none">
                                <img id="d" src="/home/images/tx/tx4.jpg " onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value="/home/images/tx/tx5.jpg" id="5" name="mycall"
                                       style="display:none">
                                <img id="e" src="/home/images/tx/tx5.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value="/home/images/tx/tx6.jpg" id="6" name="mycall"
                                       style="display:none">
                                <img id="f" src="/home/images/tx/tx6.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value="/home/images/tx/tx7.jpg" id="7" name="mycall"
                                       style="display:none">
                                <img id="g" src="/home/images/tx/tx7.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value="/home/images/tx/tx8.jpg" id="8" name="mycall"
                                       style="display:none">
                                <img id="h" src="/home/images/tx/tx8.jpg" onclick="myFun(this.id)"></i></p>
                        <p><span class="tnr">留言内容 <span class="important">*</span>:</span>
                            <textarea name="lytext" cols="60" rows="12" id="lytext"></textarea>
                        </p>
                        <p>
                            <input type="submit" name="Submit3" value="提交"/>
                            <input name="enews" type="hidden" id="enews" value="AddGbook"/>
                        </p>
                    </form>
                </div>

                @foreach($messages as $message)
                    <div class="fb">
                        <ul>
                            <span class="tximg"><img src="{{$message->avatar}}"></span>
                            <p class="fbtime"><span>{{$message->created_at}}</span>{{$message->username}}</p>
                            <p class="fbinfo">{{$message->content}}</p>
                        </ul>

                        @if($message->replies)
                            @foreach($message->replies as $reply)
                                <div class="hf">
                                    <ul>
                                        <p class="zzhf"><span style="color: #ff0000">站长回复:</span>{{$reply->content}}</p>
                                    </ul>
                                </div>
                            @endforeach
                        @endif

                    </div>
                @endforeach
                <div class="clear"></div>
                {{$messages->links()}}
            </div>
            <!--newsinfo end-->

        </div>
    </article>
@endsection
@section('scriptsAfterJs')
    <script>
        $(document).ready(function () {

        });

        /**
         * 选中头像
         * @param sId
         */
        function myFun(sId) {
            var oImg = document.getElementsByTagName('img');
            for (var i = 0; i < oImg.length; i++) {
                if (oImg[i].id == sId) {
                    oImg[i].previousSibling.previousSibling.checked = true;
                    oImg[i].style.opacity = '1';
                } else {
                    oImg[i].style.opacity = '.8';
                }
            }
        }

        /**
         * 检查留言
         * @param obj
         * @returns {boolean}
         * @constructor
         */
        function CheckLeaving(obj) {
            let username = obj.username.value
            let avatar = $("input[name='mycall']:checked").val()
            let captcha = obj.captcha.value
            let lytext = obj.lytext.value
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

            if (lytext == "") {
                alert("您没什么话要说吗？");
                obj.saytext.focus();
                return false;
            }

            $.ajax({
                type: "POST",
                url: "{{route('message.leaving')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: obj.id.value,
                    username: username,
                    avatar: avatar,
                    captcha: captcha,
                    content: lytext
                },
                dataType: "json",
                success: function (data) {
                    if (data.code == 0) {
                        alert(data.message)
                        window.location.reload()
                    } else {
                        alert(data.message)
                    }
                }
            })
            return false;
        }
    </script>
@endsection
