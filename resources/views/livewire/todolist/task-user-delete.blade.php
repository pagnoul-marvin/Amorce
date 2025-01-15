<div class="task_users_form_users_list_container">

    <p class="hel_bold task_users_form_users_list_container_title">{{__('texts.users_added')}}</p>

    @if(count($assigned_users) > 0)

        <ul class="task_users_form_users_list flex">

            @foreach($assigned_users as $assigned_user)

                <li class="task_users_form_users_list_item flex" wire:key="picture-added-user-{{$assigned_user->id}}">

                    <img
                        class="task_users_form_users_list_item_picture"
                        src="{{ $assigned_user->picture ? asset('users/'.$assigned_user->id.'/picture/'.basename($assigned_user->picture)) : asset('img/photo_profile.jpg') }}"
                        alt="{{ __('texts.profile_photo') }} {{ $assigned_user->firstname }}"
                        title="{{ $assigned_user->firstname }} {{ $assigned_user->lastname }} {{ $assigned_user->email }}">

                    <span class="task_users_form_users_list_item_name hel_reg" title="{{$assigned_user->firstname}} {{$assigned_user->lastname}}">
                            {{$assigned_user->firstname}} {{$assigned_user->lastname}}
                        </span>

                    @if($task->user_id === Auth::id())

                        <form wire:submit="deleteTaskUsers({{$task->id}},{{$assigned_user->id}})"
                              class="task_users_form_users_list_item_form">

                            <x-form.submit-button :text="__('texts.delete')"
                                                  div_class="task_users_form_users_list_item_form_submit_btn_container"
                                                  btn_class="task_users_form_users_list_item_form_submit_btn_container_btn submit_btn button"/>

                        </form>

                    @endif

                </li>

            @endforeach

        </ul>

    @else

        <p class="no_user hel_reg">{{__('texts.no_users')}}</p>

    @endif

</div>
