<div
    class="app_nav_theme_switcher_and_profile_content flex {{ request()->segment(1) == 'profil' || request()->segment(1) == 'espace-administrateur' ? 'active' : 'inactive' }}"
    @click="$dispatch('toggleProfileModalVisibility')">

    <div class="app_nav_theme_switcher_and_profile_content_image flex">

        <img
            class="app_nav_theme_switcher_and_profile_content_image_img"
            src="{{ Auth::user()->picture ? asset('users/'.Auth::id().'/picture/'.basename(Auth::user()->picture)) : asset('img/photo_profile.jpg') }}"
            alt="{{ __('texts.profile_photo') }} {{ Auth::user()->firstname }}">

    </div>

    <div class="app_nav_theme_switcher_and_profile_content_text">

        <span class="hel_reg profile_info">{{$firstname}} {{$lastname}}</span>
        <span class="hel_reg profile_info">{{$email}}</span>

    </div>

    <livewire:modals.profile-modal/>

</div>
