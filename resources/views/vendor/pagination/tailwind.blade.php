@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
           

            <div class="page-items">
                <span class="">
                    
                    @if ($paginator->onFirstPage())
                        <span class="">
                            <
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="">
                            <
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <a href="#" class="content-text">{{ $page }}</a>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="content-text" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="">
                            >
                        </a>
                     @else
                        <span class="">
                            >
                        </span>
                    @endif
                    
                </span>
            </div>
        </div>
    </nav>

    
@endif

