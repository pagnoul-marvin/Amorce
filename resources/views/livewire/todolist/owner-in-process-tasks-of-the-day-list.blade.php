<div class="task_index_tasks_manager_section_lists_container_section_content flex">

    <div class="flex task_index_tasks_manager_section_lists_container_section_content_title_and_button_container">

        <h3 class="hel_bold task_index_tasks_manager_section_lists_container_section_content_title_and_button_container_title">{{__('texts.task_where_you_are_owner')}}</h3>

    </div>

    <ul class="flex task_index_tasks_manager_section_lists_container_section_content_owner_task_in_process_list">

        @foreach($this->inProcessTasksOfTheDay() as $task)

            <livewire:todolist.owner-in-process-tasks-of-the-day-list-item :$task wire:key="owner-in-process-task-{{$task->id}}"/>

        @endforeach

        {{ $this->inProcessTasksOfTheDay()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

    </ul>

</div>


