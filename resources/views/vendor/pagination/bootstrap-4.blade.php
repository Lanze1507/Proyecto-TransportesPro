<style>

.pagination{

    gap:10px;
}

.page-item{

    margin:0 2px;
}

.page-link{

    border:none !important;

    min-width:42px;

    height:42px;

    border-radius:14px !important;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:700;

    font-size:14px;

    color:#0b1c39;

    background:#fff;

    box-shadow:
        0 8px 20px rgba(0,0,0,.05);

    transition:.25s ease;
}

.page-link:hover{

    background:#ff5e14;

    color:#fff;

    transform:translateY(-2px);
}

.page-item.active .page-link{

    background:#ff5e14 !important;

    color:#fff !important;

    box-shadow:
        0 10px 25px rgba(255,94,20,.28);
}

.page-item.disabled .page-link{

    opacity:.45;

    background:#f3f4f6;

    color:#9ca3af;
}

</style>
@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
