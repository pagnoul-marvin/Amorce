<div class="task_users_form_users_list_container flex">

    <p class="hel_bold task_users_form_users_list_container_title">{{__('texts.users_can_be_added')}}</p>

    <label class="hidden" for="search">{{__('texts.search')}}</label>
    <input class="search_form_input" placeholder="{{__('texts.search')}}" type="text" id="search"
           name="search" wire:model.live="search">

    @if(count($users_able_to_be_added) > 0)

        <ul class="task_users_form_users_list flex">

            @foreach($users_able_to_be_added as $unique_user)

                <li class="task_users_form_users_list_item flex" wire:key="user-{{$unique_user->id}}">

                    <img
                        class="task_users_form_users_list_item_picture"
                        src="{{ $unique_user->picture ? asset('users/'.$unique_user->id.'/picture/'.basename($unique_user->picture)) : asset('img/photo_profile.jpg') }}"
                        alt="{{ __('texts.profile_photo') }} {{ $unique_user->firstname }}"
                        title="{{ $unique_user->firstname }} {{ $unique_user->lastname }} {{ $unique_user->email }}">

                    <span class="task_users_form_users_list_item_name hel_reg" title="{{$unique_user->firstname}} {{$unique_user->lastname}}">
                            {{$unique_user->firstname}} {{$unique_user->lastname}}
                        </span>

                    <form wire:submit="addTaskUsers({{$task->id}},{{$unique_user->id}})"
                          class="task_users_form_users_list_item_form">

                        <x-form.submit-button :text="__('texts.add')"
                                              div_class="task_users_form_users_list_item_form_submit_btn_container"
                                              btn_class="task_users_form_users_list_item_form_submit_btn_container_btn submit_btn button"/>

                    </form>

                </li>

            @endforeach
        </ul>

    @else

        <p class="no_user hel_reg">{{__('texts.no_users')}}</p>

    @endif

</div>


