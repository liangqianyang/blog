<div class="whitebg wenzi">
    <h2 class="htitle">猜你喜欢</h2>
    <ul>
        @foreach ($articles as $item)
            <li><a href="{{ route('article.show', ['id'=>$item->id]) }}">{{$item->title}}</a></li>
        @endforeach
    </ul>
</div>
