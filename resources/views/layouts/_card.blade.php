<div class="card">
    <h2>我的名片1</h2>
    <p>网名：{{$info['en_name']}} | {{$info['cn_name']}}</p>
    <p>职业：{{$info['profession']}}</p>
    <p>现居：{{$info['address']}}</p>
    <p>Email：{{$info['email']}}</p>
    <ul class="linkmore">
        <li><a href="https://www.lqy-comic.com" target="_blank" class="iconfont icon-zhuye" title="网站地址"></a></li>
        <li><a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email={{$info['email']}}" target="_blank" class="iconfont icon-youxiang" title="我的邮箱"></a></li>
        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=543492227&site=qq&menu=yes" target="_blank" class="iconfont icon---" title="QQ联系我"></a></li>
        <li id="weixin"><a href="#" target="_self" class="iconfont icon-weixin" title="关注微信公众号"></a><i><img src="/home/images/wxgzh.jpg"></i></li>
    </ul>
</div>
