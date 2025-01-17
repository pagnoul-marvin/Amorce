<div class="task_index_tasks_manager_section_lists_container_section_content flex">

    <div class="flex task_index_tasks_manager_section_lists_container_section_content_title_and_button_container">

        <h3 class="hel_bold task_index_tasks_manager_section_lists_container_section_content_title_and_button_container_title">{{__('texts.task_where_you_are_assigned')}}</h3>

    </div>

    <ul class="flex task_index_tasks_manager_section_lists_container_section_content_assigned_task_archived_list">

        @foreach($this->assignedArchivedTasksForTheDay() as $assignedTask)

            <livewire:todolist.assigned-archived-tasks-of-the-day-list-item :$assignedTask
                                                                            wire:key="assigned-archived-task-{{$assignedTask->id}}"/>

        @endforeach


    </ul>

    {{ $this->assignedArchivedTasksForTheDay()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</div>

