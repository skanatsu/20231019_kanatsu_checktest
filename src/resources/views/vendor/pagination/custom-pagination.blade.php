@if ($paginator->hasPages())
    <nav>
        <ul class="pagination" style="display: flex; list-style: none; margin-right: -10px;">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true" style="border: 1px solid black; padding: 10px 12px; font-size: 16px; color: black; text-decoration: none;">＜</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="border: 1px solid black; padding: 10px 12px; font-size: 16px; color: black; text-decoration: none;">＜</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link" style="border: 1px solid black; padding: 10px 12px; font-size: 16px; color: black; text-decoration: none;">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link current-page" style="background-color: black; color: white; border: 1px solid black; padding: 10px 12px; font-size: 16px;">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}" style="border: 1px solid black; padding: 10px 12px; font-size: 16px; color: black; text-decoration: none;">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="border: 1px solid black; padding: 10px 12px; font-size: 16px; color: black; text-decoration: none;">＞</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true" style="border: 1px solid black; padding: 10px 12px; font-size: 16px; color: black; text-decoration: none;">＞</span>
                </li>
            @endif
        </ul>
    </nav>
@endif