@php if (! isset($scrollTo)) {
     $scrollTo = 'body';
 }

 $scrollIntoViewJsSnippet = ($scrollTo !== false)
     ? <<<JS
        (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
     JS
     : '';

@endphp

@if ($paginator->hasPages())
    <nav class="custom-pagination">
            @if ($paginator->onFirstPage())
                <span class="circle-btn disabled" aria-disabled="true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </span>
            @else
                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{$scrollIntoViewJsSnippet}}" class="circle-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         class="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
            @endif

            <div class="dotted-line">
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="dot-separator">...</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <button
                                type="button"
                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                x-on:click="{{$scrollIntoViewJsSnippet}}"
                                class="dot {{ $page == $paginator->currentPage() ? 'active' : '' }} hel_bold"
                                title="{{ __('texts.page') }} {{ $page }}">{{$page}}
                            </button>
                        @endforeach
                    @endif
                @endforeach
            </div>

            @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{$scrollIntoViewJsSnippet}}"
                        class="circle-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         class="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            @else
                <span class="circle-btn disabled" aria-disabled="true">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </span>
            @endif
    </nav>
@endif
