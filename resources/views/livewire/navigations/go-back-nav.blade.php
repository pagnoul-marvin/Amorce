<nav class="go_back_nav">

    <h2 class="hidden">{{__('text.back_nav')}}</h2>

    <a class="go_back_btn flex hel_reg" href="{{$href}}" title="{{$text}}" wire:navigate>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48" height="48">
            <path d="M30 8 L14 24 L30 40" fill="none" stroke="var(--white_color_switchable)" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        {{$text}}
    </a>

</nav>
