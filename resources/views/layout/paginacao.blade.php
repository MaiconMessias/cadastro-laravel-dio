@if ($paginator->hasPages())

    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="disabled">
               {!! __('pagination.previous') !!} 
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}">
                    {!! __('pagination.previous') !!}
                </a>
            </li>  
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)

        {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <a>{{ $page }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        </li>    
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">
                    {!! __('pagination.next') !!}
                </a>
            </li>
        @else
            <li class="disabled">
                {!! __('pagination.next') !!}
            </li>
        @endif
    </ul>

@endif