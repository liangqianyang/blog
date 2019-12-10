<div class="searchbox">
    <div class="search">
        <form action="{{ route('search') }}" method="get" name="searchform" id="searchform">
            <input name="keyword" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);"
                   onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}"
                   onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
            <input name="submit" class="input_submit" value="搜索" type="submit">
        </form>
    </div>
    <div class="searchclose"></div>
</div>
