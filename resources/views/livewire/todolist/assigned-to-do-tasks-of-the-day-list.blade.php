<div class="task_index_tasks_manager_section_lists_container_section_content flex">

    <div class="flex task_index_tasks_manager_section_lists_container_section_content_title_and_button_container">

        <h3 class="hel_bold task_index_tasks_manager_section_lists_container_section_content_title_and_button_container_title">{{__('texts.task_where_you_are_assigned')}}</h3>

    </div>

    <ul class="flex task_index_tasks_manager_section_lists_container_section_content_assigned_task_to_do_list">

        @foreach($this->assignedTasksForTheDay() as $assignedTask)

            <livewire:todolist.assigned-to-do-tasks-of-the-day-list-item :$assignedTask wire:key="assigned-task-{{$assignedTask->id}}"/>

        @endforeach

        {{ $this->assignedTasksForTheDay()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

    </ul>

</div>

