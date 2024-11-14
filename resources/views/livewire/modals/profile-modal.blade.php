<div class="app_nav_theme_switcher_and_profile_content_modal" x-data="{open : @entangle('isOpen')}" x-show="open"
     x-transition:enter="transition ease-out duration-300 transform"
     x-transition:enter-start="opacity-0 translate-x-full"
     x-transition:enter-end="opacity-100 translate-x-0"
     x-transition:leave="transition ease-in duration-200 transform"
     x-transition:leave-start="opacity-100 translate-x-0"
     x-transition:leave-end="opacity-0 translate-x-full">

    <nav>

        <h2 class="hidden">{{$title}}</h2>

        <ul class="app_nav_theme_switcher_and_profile_content_modal_list flex">

            @foreach($links as $link)

                <li class="app_nav_theme_switcher_and_profile_content_modal_list_item">
                    <a class="hel_bold app_nav_theme_switcher_and_profile_content_modal_list_item_link"
                       href="{{$link['url']}}"
                       title="{{__('texts.page_link')}} {{$link['name']}}">{{$link['name']}}
                    </a>
                </li>

            @endforeach

            <li class="app_nav_theme_switcher_and_profile_content_modal_list_item">

                <form action="{{route('logout')}}" method="post">

                    @csrf

                    <button class="hel_bold app_nav_theme_switcher_and_profile_content_modal_list_item_form_btn"
                            type="submit" title="{{__('texts.logout')}}">{{__('texts.logout')}}</button>

                </form>

            </li>

        </ul>

    </nav>

</div>
