<div
    class="app_nav_theme_switcher_and_profile_content flex {{ request()->segment(1) == 'profil' || request()->segment(1) == 'espace-administrateur' ? 'active' : 'inactive' }}"
    @click="$dispatch('toggleProfileModalVisibility')">

    <div class="app_nav_theme_switcher_and_profile_content_image flex">

        @if(Auth::user()->picture)
            <img
                class="app_nav_theme_switcher_and_profile_content_image_img"
                srcset="
                        {{asset('users/'.Auth::id().'/large/'.basename(Auth::user()->picture))}} 720w,
                {{asset('users/'.Auth::id().'/medium/'.basename(Auth::user()->picture))}} 500w,
                {{asset('users/'.Auth::id().'/small/'.basename(Auth::user()->picture))}} 300w"
                sizes="(max-width: 800px) 300px,(max-width: 1000px) 500px, 720px"
                src="{{asset(Auth::user()->picture)}}" alt="{{__('texts.profile_photo')}} {{Auth::user()->firstname}}"
                title="{{Auth::user()->firstname}} {{Auth::user()->lastname}} {{Auth::user()->email}}">
        @else

            <img class="app_nav_theme_switcher_and_profile_content_image_img" srcset="
                        {{asset('img/photo_720.jpg')}} 720w,
                {{asset('img/photo_500.jpg')}} 500w,
                {{asset('img/photo_300.jpg')}} 300w"
                 sizes="(max-width: 800px) 300px,(max-width: 1000px) 500px, 720px"
                 src="{{ asset('img/photo_720.jpg') }}"
                 alt="{{ __('texts.profile_photo') }} {{ Auth::user()->firstname }}">
        @endif

    </div>

    <div class="app_nav_theme_switcher_and_profile_content_text">

        <span class="hel_reg profile_info">{{$firstname}} {{$lastname}}</span>
        <span class="hel_reg profile_info">{{$email}}</span>

    </div>

    <livewire:modals.profile-modal/>

</div>
