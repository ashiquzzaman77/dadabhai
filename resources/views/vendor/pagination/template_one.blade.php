@if ($paginator->hasPages())

    <nav aria-label="Page navigation example">

        <ul class="pagination">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="page-link" href="javascript:;"><i class="fas fa-angle-left"></i> Prev</a>
                    {{-- <a class="page-link" href="#"><i class="fas fa-angle-left"></i> Prev</a> --}}
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev"
                        aria-label="@lang('pagination.previous')"><i class="fas fa-angle-left"></i> Prev</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">

                                <a class="page-link active" href="{{ $url }}">{{ $page }}</a>
                                {{-- <span>{{ $page }}</span> --}}

                            </li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next"
                        aria-label="@lang('pagination.next')">Next <i class="fas fa-angle-right"></i></a>
                </li>
            @else
                <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link" href="javascript:;">Next <i class="fas fa-angle-right"></i></a>
                </li>
            @endif

        </ul>
    </nav>
@endif




{{-- <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i> Prev</a></li>
        <li class="page-item  active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">Next <i class="fas fa-angle-right"></i></a></li>
    </ul>
</nav> --}}
