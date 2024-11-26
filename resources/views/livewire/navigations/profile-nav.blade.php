<div class="app_nav_theme_switcher_and_profile_content flex {{ request()->segment(1) == 'profil' || request()->segment(1) == 'espace-administrateur' ? 'active' : 'inactive' }}"
     @click="$dispatch('toggleProfileModalVisibility')">

    <div class="app_nav_theme_switcher_and_profile_content_image">

        <img src="{{asset(Auth::user()->picture)}}"
             alt="{{__('texts.profile_photo')}} {{$firstname}}">

    </div>

    <div class="app_nav_theme_switcher_and_profile_content_text">

        <span class="hel_reg profile_info">{{$firstname}} {{$lastname}}</span>
        <span class="hel_reg profile_info">{{$email}}</span>

    </div>

    <livewire:modals.profile-modal/>

</div>
