<div>
    <x-page-title-and-description :title="null"
                                  :description="implode(' ', [__('texts.see_the_profile_of'), implode(' ', [$user->firstname, $user->lastname])])"
                                  :bold_part="implode(' ', [$user->firstname, $user->lastname])"/>

    <section class="profile_form_section flex">

        <h2 class="hidden">{{ __('texts.profile_form') }}</h2>

        <div class="profile_form_section_profile_picture_container flex">

            <img class="profile_form_section_profile_picture_container_img"
                 src="{{ $user->picture ? asset('users/'.$user->id.'/picture/'.basename($user->picture)) : asset('img/photo_profile.jpg') }}"
                 alt="{{ __('texts.profile_photo') }} {{ $user->firstname }}">

        </div>


        <ul class="flex task_show_section_list">

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.firstname')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">{{$user->firstname}}</p>
                </div>
            </li>

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.lastname')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">{{$user->lastname}}</p>
                </div>
            </li>

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.mail_address')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">{{$user->email}}</p>
                </div>
            </li>

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.phone')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">{{$user->phone}}</p>
                </div>
            </li>

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.role')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">{{$user->role}}</p>
                </div>
            </li>

        </ul>

    </section>

</div>
