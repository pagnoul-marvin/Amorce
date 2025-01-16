<li class="flex task_index_tasks_manager_section_lists_container_section_content_owner_task_to_do_list_item">

    <a class="task_index_tasks_manager_section_lists_container_section_content_owner_task_to_do_list_item_link hel_reg" href="{{route('tasks.show', $task->id)}}" title="{{__('texts.see_details')}} {{$task->title}}" wire:navigate></a>

    <p class="hel_reg task_index_tasks_manager_section_lists_container_section_content_owner_task_to_do_list_item_fake_link">{{$task->title}}</p>

</li>
