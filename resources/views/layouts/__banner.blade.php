<div class="banner">
    <div class="layui-carousel" id="test" lay-filter="test">
        <div carousel-item="">
            <div><img src="http://blog.test/home/layui/css/modules/layim/skin/1.jpg"></div>
            <div><img src="http://blog.test/home/layui/css/modules/layim/skin/2.jpg"></div>
            <div><img src="http://blog.test/home/layui/css/modules/layim/skin/3.jpg"></div>
            <div><img src="http://blog.test/home/layui/css/modules/layim/skin/4.jpg"></div>
            <div><img src="http://blog.test/home/layui/css/modules/layim/skin/5.jpg"></div>
        </div>
    </div>
    <div class="cont w1000">
        <div class="title">
            <h3>枫叶BLOG</h3>
        </div>
    </div>
</div>

<script type="text/javascript">
    layui.use(['carousel'], function(){
        var carousel = layui.carousel
        //改变下时间间隔、动画类型、高度
        //常规轮播
        carousel.render({
            elem: '#test'
            ,arrow: 'hover'
            ,indicator:'none'
            ,width: '100%'
            ,height: '440px'
            ,interval: 3000
        });
    })
</script>
