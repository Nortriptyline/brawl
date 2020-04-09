@if ($paginator->hasPages())
<ul class="pagination">
    @if ($paginator->onFirstPage())
    <li class="disabled">
        <a href="#!">
            <i class="material-icons">chevron_left</i>
        </a>
    </li>
    @else
    <li class="waves-effect">
        <a href="{{ $paginator->previousPageUrl() }}">
            <i class="material-icons">chevron_left</i>
        </a>
    </li>
    @endif

    @foreach ($elements as $element)
    @if (is_array($element))
    @foreach ($element as $page => $url)

    {{-- Active page --}}
    @if ($page == $paginator->currentPage())
    <li class="active blue">
        <a href="{{ $url }}">{{ $page }}</a>
    </li>
    {{-- Other Pages --}}
    @else
    <li class="waves-effect">
        <a href="{{ $url }}">{{ $page }}</a>
    </li>
    @endif
    @endforeach
    @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <li>
        <a href="{{ $paginator->nextPageUrl() }}">
            <i class="material-icons">chevron_right</i>
        </a>
    </li>
    @else
    <li class="disabled">
        <a href="{{ $paginator->nextPageUrl() }}">
            <i class="material-icons">chevron_right</i>
        </a>
    </li>
    @endif
</ul>
@endif
