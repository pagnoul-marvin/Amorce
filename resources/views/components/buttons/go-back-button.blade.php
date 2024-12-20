@props(['text', 'href'])

<nav class="go_back_nav">

    <h2 class="hidden">{{__('text.back_nav')}}</h2>

    <a class="go_back_btn flex hel_reg" href="{{$href}}" title="{{$text}}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
            <path d="M30 8 L14 24 L30 40" fill="none" stroke="var(--white_color_switchable)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        {{$text}}
    </a>

</nav>

