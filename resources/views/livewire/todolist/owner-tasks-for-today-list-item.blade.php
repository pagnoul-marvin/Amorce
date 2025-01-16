<li class="flex task_index_tasks_manager_section_owner_task_list_item">

    <a href="{{route('tasks.show', $task->id)}}" title="{{__('texts.see_details')}} {{$task->title}}" wire:navigate>{{$task->title}}</a>

    <div class="flex picture_container">

        <ul class="todo_list_section_content_list_item_profile_pictures_list flex">

            @foreach($assignedUsers as $assignedUser)

                <li class="todo_list_section_content_list_item_profile_pictures_list_item" wire:key="task-user-{{$assignedUser->id}}">

                    <img
                        class="todo_list_section_content_list_item_profile_pictures_list_item_img"
                        src="{{ $assignedUser->picture ? asset('users/'.$assignedUser->id.'/picture/'.basename($assignedUser->picture)) : asset('img/photo_profile.jpg') }}"
                        alt="{{ __('texts.profile_photo') }} {{ $assignedUser->firstname }}"
                        title="{{ $assignedUser->firstname }} {{ $assignedUser->lastname }} {{ $assignedUser->email }}">

                </li>

            @endforeach

        </ul>

    </div>

</li>
