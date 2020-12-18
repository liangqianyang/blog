<div class="whitebg tuijian">
    <h2 class="htitle">站长推荐</h2>
    <section class="topnews imgscale">
        @if(count($articles)>0)
        <a href="{{ route('article.show', ['id'=>$articles->get(0)->id]) }}">
            <img src="{{$articles->get(0)->cover}}">
            <span>{{$articles->get(0)->title}}</span>
        </a>
        @endif
    </section>
    <ul>
        @foreach ($articles as $item)
            <li>
                <a href="{{ route('article.show', ['id'=>$item->id]) }}"><i><img src="{{$item->cover}}"></i>
                    <p>{{$item->title}}</p>
                </a>
            </li>
        @endforeach
    </ul>
</div>
