<div class="whitebg notice">
    <h2 class="htitle">网站公告</h2>
    <ul>
        @foreach ($notices as $notice)
            <li><a href="{{ route('notice.show', [$notice->id]) }}">{{$notice->title}}</a></li>
        @endforeach
    </ul>
</div>
