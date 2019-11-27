<div class="whitebg paihang">
    <h2 class="htitle">点击排行</h2>
    <section class="topnews imgscale">
        <a href="{{ route('article.show', ['id'=>$articles->get(0)->id]) }}">
            <img src="{{$articles->get(0)->cover}}">
            <span>{{$articles->get(0)->title}}</span>
        </a>
    </section>
    <ul>
        @foreach ($articles as $item)
        <li>
            <i></i>
            <a href="{{ route('article.show', ['id'=>$item->id]) }}">{{$item->title}}</a>
        </li>
        @endforeach
    </ul>
</div>
