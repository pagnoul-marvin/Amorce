<section class="section flex detente_section">

    <div class="button_title_container flex">

        <h2 class="section_title hel_bold">

            {{__('texts.detentes')}}

        </h2>

        <div class="button_title_container_button_container flex">

            <livewire:buttons.modal-button
                type="settings"
                :title="__('texts.manage_this_detente')"
                to="modals.manage-detente-modal"
                event="openModal"
                params="{'id': {{$detente->id}}}"
                wire:key="manage-detente-btn" />
            <livewire:buttons.modal-button type="add" :title="__('texts.create_detente')"
                                           to="modals.create-detente-modal" event="openModal"
                                           wire:key="create-detente-btn"/>

        </div>

    </div>

    <div class="detente_section_content">

        <p class="detente_section_content_date flex">
            <button type="button" class="circle-btn" wire:click="previousDetente">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <span class="hel_reg">
               <span class="hel_bold"> Date de début :</span> {{ \Carbon\Carbon::parse($detente->starting_at)->translatedFormat('l d F Y') }}
            </span>

            <span class="hel_reg"><span class="hel_bold">Date de fin :</span> {{ \Carbon\Carbon::parse($detente->ending_at)->translatedFormat('l d F Y') }}</span>

            <button type="button" class="circle-btn" wire:click="nextDetente">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </p>

        <ul class="detente_section_content_users_list flex">

            @foreach($detenteUsers as $user)

                <li class="detente_section_content_users_list_item flex" wire:key="detente-user-{{$user->id}}">

                    <div class="detente_section_content_users_list_item_name_and_profile_container flex">

                        <img
                            class="detente_section_content_users_list_item_name_and_profile_container_profile_picture"
                            src="{{ $user->picture ? asset('users/'.$user->id.'/picture/'.basename($user->picture)) : asset('img/photo_profile.jpg') }}"
                            alt="{{ __('texts.profile_photo') }} {{ $user->firstname }}"
                            title="{{ $user->firstname }} {{ $user->lastname }} {{ $user->email }}">

                        <a href="{{$user->id == Auth::id() ? route('profile.edit') : route('profile.show', $user->id)}}" title="{{__('texts.see_the_profile_of')}} {{$user->firstname}}" class="hel_reg detente_section_content_users_list_item_name_and_profile_container_name">{{$user->id == Auth::id() ? 'Vous' : $user->firstname}} {{$user->id == Auth::id() ? '' : $user->lastname}}</a>

                    </div>

                    <p class="hel_reg detente_section_content_users_list_item_email">{{$user->email}}</p>

                    <p class="hel_reg detente_section_content_users_list_item_role">{{$user->role}}</p>

                </li>

            @endforeach

        </ul>

    </div>


</section>
