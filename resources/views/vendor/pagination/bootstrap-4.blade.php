@if ($paginator->hasPages())
    <div class="pagelist">
        <a title="Total record">&nbsp;<b>{{$paginator->total() }}</b></a>
        @if ($paginator->onFirstPage())
            &nbsp;&nbsp;&nbsp;<b>首页</b>&nbsp;
        @else
            &nbsp;&nbsp;&nbsp;<a href="{{$paginator->previousPageUrl() }}" rel="上一页">上一页</a>&nbsp;
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <b>{{ $element }}</b>&nbsp;
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <b>{{ $page }}</b>&nbsp;
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>&nbsp;
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="下一页">下一页</a>&nbsp;
        @else
            <a href="javascript:;" rel="尾页">尾页</a>&nbsp;
        @endif
    </div>
@endif
