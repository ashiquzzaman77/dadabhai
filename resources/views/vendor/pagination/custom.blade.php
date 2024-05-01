@if ($paginator->hasPages())

    <ul class="page-numbers">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a href="javascript:;" class="tp-pagination-prev prev page-numbers">
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"
                    class="tp-pagination-prev prev page-numbers">
                    <i class="fa fa-angle-left"></i>
                </a>
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
                        <li class="active" aria-current="page"><a href="{{ $url }}"
                                class="page-numbers current">{{ $page }}</a></li>
                    @else
                        <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers" rel="next"
                    aria-label="@lang('pagination.next')">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                {{-- <span aria-hidden="true"></span> --}}

                <a href="javascript:;" class="next page-numbers">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        @endif

    </ul>


    {{-- <ul class="page-numbers">

        <li>
            <a class="next page-numbers" href="#">
                <i class="fa fa-angle-left"></i>
            </a>
        </li>

        <li>
            <span class="page-numbers current">1</span>
        </li>

        <li>
            <a class="page-numbers" href="#">2</a>
        </li>

        <li>
            <a class="next page-numbers" href="#">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>

    </ul> --}}

@endif
