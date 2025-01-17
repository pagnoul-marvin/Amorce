<li class="flex task_index_tasks_manager_section_lists_container_section_content_assigned_task_archived_list_item">

    <a class="task_index_tasks_manager_section_lists_container_section_content_assigned_task_archived_list_item_link hel_reg" href="{{route('tasks.show', $assignedTask->id)}}" title="{{__('texts.see_details')}} {{$assignedTask->title}}" wire:navigate></a>

    <p class="hel_reg task_index_tasks_manager_section_lists_container_section_content_assigned_task_archived_list_item_fake_link">{{$assignedTask->title}}</p>

</li>

