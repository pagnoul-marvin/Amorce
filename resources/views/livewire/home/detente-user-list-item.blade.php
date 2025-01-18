<li class="home_detente_section_content_list_item flex">

    <div class="home_detente_section_content_list_item_name_and_profile_container flex">

        <img
            class="home_detente_section_content_list_item_name_and_profile_container_profile_picture"
            src="{{ $user->picture ? asset('users/'.$user->id.'/picture/'.basename($user->picture)) : asset('img/photo_profile.jpg') }}"
            alt="{{ __('texts.profile_photo') }} {{ $user->firstname }}"
            title="{{ $user->firstname }} {{ $user->lastname }} {{ $user->email }}">

        <a href="{{$user->id == Auth::id() ? route('profile.edit') : route('profile.show', $user->id)}}" title="{{__('texts.see_the_profile_of')}} {{$user->firstname}}" class="hel_reg home_detente_section_content_list_item_name_and_profile_container_name">{{$user->id == Auth::id() ? 'Vous' : $user->firstname}} {{$user->id == Auth::id() ? '' : $user->lastname}}</a>

    </div>

    <p class="hel_reg home_detente_section_content_list_item_email">{{$user->email}}</p>

    <p class="hel_reg home_detente_section_content_list_item_role">{{$user->role}}</p>

</li>
