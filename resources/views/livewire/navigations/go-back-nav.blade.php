<nav class="go_back_nav">

    <h2 class="hidden">{{__('text.back_nav')}}</h2>

    <a class="go_back_btn flex hel_reg" href="{{$href}}" title="{{$text}}" wire:navigate>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path d="M15 4 L7 12 L15 20" fill="none" stroke="var(--white_color_switchable)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        {{$text}}
    </a>

</nav>
