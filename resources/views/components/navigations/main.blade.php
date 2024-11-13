<div class="app_nav flex">

    <img class="app_nav_logo" src="{{asset('img/logo198x82.png')}}" alt="{{__('texts.amorce_logo')}}" width="198" height="82">

    <nav class="app_nav_main">

        <h2 class="hidden">{{$main_nav_title}}</h2>

        <ul class="app_nav_main_list flex">

            @foreach($main_links as $main_link)

                <li class="app_nav_main_list_item {{request()->segment(1) == ltrim($main_link['url'], '/') ? 'active' : 'inactive'}}">
                    <a class="hel_reg app_nav_main_list_item_link"
                       href="{{$main_link['url']}}"
                       title="{{__('texts.page_link')}} {{$main_link['name']}}">{{$main_link['name']}}</a>
                </li>

            @endforeach

        </ul>

    </nav>

    <div class="app_nav_theme_switcher_and_profile flex">

        <livewire:theme-switcher/>

        <div class="app_nav_theme_switcher_and_profile_content flex"
             wire:click="dispatchTo('modals.profile-modal', 'openModal')">

            <img class="app_nav_theme_switcher_and_profile_content_image" src="{{asset('img/photo_profil.png')}}"
                 alt="photo de profil">

            <div class="app_nav_theme_switcher_and_profile_content_text">

                <span class="hel_reg profile_info">{{$user->name}}</span>
                <span class="hel_reg profile_info">{{$user->email}}</span>

            </div>

        </div>

    </div>

</div>
