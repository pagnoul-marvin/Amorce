<li class="todo_list_section_content_list_item flex">

    <a href="{{route('tasks.show', $assigned_task->id)}}" wire:navigate title="{{__('texts.see_details')}} {{$assigned_task->title}}"
       class="todo_list_section_content_list_item_link hel_reg">{{$assigned_task->title}} ({{$assigned_task->category}})</a>

    <ul class="todo_list_section_content_list_item_profile_pictures_list flex">

        @foreach($assigned_task->users as $user)

            <li class="todo_list_section_content_list_item_profile_pictures_list_item" wire:key="assigned-task-user-{{$user->id}}">

                <img
                    class="todo_list_section_content_list_item_profile_pictures_list_item_img"
                    src="{{ $user->picture ? asset('users/'.$user->id.'/picture/'.basename($user->picture)) : asset('img/photo_profile.jpg') }}"
                    alt="{{ __('texts.profile_photo') }} {{ $user->firstname }}"
                    title="{{ $user->firstname }} {{ $user->lastname }} {{ $user->email }}">

            </li>

        @endforeach

    </ul>

</li>
