<li class="flex task_index_tasks_manager_section_lists_container_section_content_owner_task_to_do_list_item">

    <a class="task_index_tasks_manager_section_lists_container_section_content_owner_task_to_do_list_item_link hel_reg" href="{{route('tasks.show', $task->id)}}" title="{{__('texts.see_details')}} {{$task->title}}" wire:navigate></a>

    <p class="hel_reg task_index_tasks_manager_section_lists_container_section_content_owner_task_to_do_list_item_fake_link">{{$task->title}}</p>

    <div class="task_index_tasks_manager_section_lists_container_section_content_owner_task_to_do_list_item_btn_container flex">

        <form wire:submit="save" class="form_btn">

            <x-buttons.submit-button type="down" :title="__('texts.make_this_task_in_process')"/>

        </form>

    </div>

</li>
