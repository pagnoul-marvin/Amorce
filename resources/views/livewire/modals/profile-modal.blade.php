<div class="app_nav_theme_switcher_and_profile_content_modal" x-data="{open : @entangle('isOpen')}" x-show="open"
     x-transition:enter="profile-modal-transition"
     x-transition:enter-start="profile-modal-enter"
     x-transition:enter-end="profile-modal-enter-active"
     x-transition:leave="profile-modal-transition"
     x-transition:leave-start="profile-modal-leave"
     x-transition:leave-end="profile-modal-leave-active">

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

                    <x-form.submit-button :text="__('texts.logout')"
                                          class="app_nav_theme_switcher_and_profile_content_modal_list_item_form_btn"/>

                </form>

            </li>

        </ul>

    </nav>

</div>
