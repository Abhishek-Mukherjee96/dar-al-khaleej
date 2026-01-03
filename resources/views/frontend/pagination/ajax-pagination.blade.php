@if ($paginator->hasPages())
<ul class="pagination justify-content-center mt-3">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
    @else
    <li class="page-item">
        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" data-page="{{ $paginator->currentPage()-1 }}">&laquo;</a>
    </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    @if (is_array($element))
    @foreach ($element as $page => $url)
    <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
        <a class="page-link" href="{{ $url }}" data-page="{{ $page }}">{{ $page }}</a>
    </li>
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" data-page="{{ $paginator->currentPage()+1 }}">&raquo;</a>
    </li>
    @else
    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
    @endif
</ul>
@endif