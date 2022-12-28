@if ($paginator->hasPages())
    <nav class="pagination_nav">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled pagination--disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="pagination-button-30" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="pagination_link">
                    <a class="pagination-button-30" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled pagination--disabled" aria-disabled="true"><span class="pagination-button-30">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active pagination--active" aria-current="page"><span class="pagination-button-30 pagination-button-30--active">{{ $page }}</span></li>
                        @else
                            <li class="pagination_link"><a class="pagination-button-30" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination_link">
                    <a class="pagination-button-30" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled pagination--disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="pagination-button-30" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
