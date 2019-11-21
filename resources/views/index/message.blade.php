@extends('layouts.app')
@section('title','留言')
@section('keywords','留言')
@section('description','留言')
@section('content')
    <article>
        <div class="whitebg">
            <h2 class="htitle">留言</h2>
            <div class="news_infos m20">
                <div class="gbox">
                    <form action="../../enews/index.php" method="post" name="form1" id="form1">
                        <p> <strong>来说点儿什么吧...</strong></p>
                        <p><span> 您的姓名:</span>
                            <input name="name" type="text" id="name" />
                            *</p>
                        <input name="email" type="hidden" id="email" value="admin@qq.com"  />
                        <p><span>选择头像:</span> *</p>
                        <p> <i>
                                <input type="radio" value= "/home/images/tx1.jpg" id= "1" name="mycall" style="display:none" selected>
                                <img id="a" src="/home/images/tx/tx1.jpg " onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value= "/home/images/tx/tx2.jpg" id= "2" name="mycall" style="display:none">
                                <img id="b" src="/home/images/tx/tx2.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value= " /home/images/tx/tx3.jpg" id= "3" name="mycall" style="display:none">
                                <img id="c" src="/home/images/tx/tx3.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value= " /home/images/tx/tx4.jpg" id= "4" name="mycall" style="display:none">
                                <img id="d" src="/home/images/tx/tx4.jpg " onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value= "/home/images/tx/tx5.jpg" id= "5" name="mycall" style="display:none">
                                <img id="e" src="/home/images/tx/tx5.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value= "/home/images/tx/tx6.jpg" id= "6" name="mycall" style="display:none">
                                <img id="f" src="/home/images/tx/tx6.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value= "/home/images/tx/tx7.jpg" id= "7" name="mycall" style="display:none">
                                <img id="g" src="/home/images/tx/tx7.jpg" onclick="myFun(this.id)"></i> <i>
                                <input type="radio" value= "/home/images/tx/tx8.jpg" id= "8" name="mycall" style="display:none">
                                <img id="h" src="/home/images/tx/tx8.jpg" onclick="myFun(this.id)"></i> </p>
                        <p><span class="tnr">留言内容:</span>
                            <textarea name="lytext" cols="60" rows="12" id="lytext"></textarea>
                        </p>
                        <p>
                            <input type="submit" name="Submit3" value="提交" />
                            <input name="enews" type="hidden" id="enews" value="AddGbook" />
                        </p>
                    </form>
                </div>


                <div class="fb">
                    <ul>
                        <span class="tximg"><img src=" /home/images/tx/tx5.jpg"></span>
                        <p class="fbtime"><span>
            2019-05-14            </span> cirzear</p>
                        <p class="fbinfo">站长啊，你是真滴牛批</p>
                    </ul>
                </div>





                <div class="fb">
                    <ul>
                        <span class="tximg"><img src=" /home/images/tx/tx7.jpg"></span>
                        <p class="fbtime"><span>
            2019-05-12            </span> 皇朝旧梦</p>
                        <p class="fbinfo">请教一下个人网站应该如何设计，或者应该遵循什么，我主做后台的，前台也有所涉及。</p>
                    </ul>
                </div>





                <div class="fb">
                    <ul>
                        <span class="tximg"><img src=" /home/images/tx/tx1.jpg"></span>
                        <p class="fbtime"><span>
            2019-05-12            </span> RENYIXIONG</p>
                        <p class="fbinfo">喜欢你的博客</p>
                    </ul>
                </div>





                <div class="fb">
                    <ul>
                        <span class="tximg"><img src=""></span>
                        <p class="fbtime"><span>
            2019-05-09            </span> java</p>
                        <p class="fbinfo">你好   可以加个好友交流一下么</p>
                    </ul>
                </div>





                <div class="fb">
                    <ul>
                        <span class="tximg"><img src=" /home/images/tx/tx5.jpg"></span>
                        <p class="fbtime"><span>
            2019-02-25            </span> www.qian.lu</p>
                        <p class="fbinfo">貌似真的不错 手机访问也没问题</p>
                    </ul>
                </div>





                <div class="fb">
                    <ul>
                        <span class="tximg"><img src=" /home/images/tx/tx1.jpg"></span>
                        <p class="fbtime"><span>
            2019-02-17            </span> 旧人以旧</p>
                        <p class="fbinfo">你的模板挺好的，正在使用</p>
                    </ul>
                </div>





                <div class="fb">
                    <ul>
                        <span class="tximg"><img src=" /home/images/tx/tx2.jpg"></span>
                        <p class="fbtime"><span>
            2018-12-26            </span> 哒哒</p>
                        <p class="fbinfo">很喜欢这个模板感觉做的不错</p>
                    </ul>
                </div>





                <div class="fb">
                    <ul>
                        <span class="tximg"><img src=" /home/images/tx/tx5.jpg"></span>
                        <p class="fbtime"><span>
            2018-12-08            </span> lookweb</p>
                        <p class="fbinfo">模板更新了可以给我们用吗？</p>
                    </ul>
                </div>


                <div class="hf">
                    <ul>
                        <p class="zzhf"><font color="#FF0000">站长回复:</font>购买，请加青青微信。476847113</p>
                    </ul>
                </div>





                <div class="fb">
                    <ul>
                        <span class="tximg"><img src=" /home/images/tx/tx3.jpg"></span>
                        <p class="fbtime"><span>
            2018-12-06            </span> dancesmile</p>
                        <p class="fbinfo">你好！这是我第一个留言的。</p>
                    </ul>
                </div>


                <div class="hf">
                    <ul>
                        <p class="zzhf"><font color="#FF0000">站长回复:</font>你好，欢迎您访问我的网站</p>
                    </ul>
                </div>





                <div class="clear"></div>
                <div class="pagelist"></div>

                <script>
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
                </script>
            </div>
            <!--newsinfo end-->

        </div>
    </article>
@endsection
