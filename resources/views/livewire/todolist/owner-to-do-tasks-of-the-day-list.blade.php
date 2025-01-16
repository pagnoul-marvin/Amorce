<div class="task_index_tasks_manager_section_lists_container_section_content flex">

    <div class="flex task_index_tasks_manager_section_lists_container_section_content_title_and_button_container">

        <h3 class="hel_bold task_index_tasks_manager_section_lists_container_section_content_title_and_button_container_title">{{__('texts.task_where_you_are_owner')}}</h3>

        <livewire:buttons.modal-button type="add" :title="__('texts.create_todo_task')"
                                       to="" event=""
                                       wire:key="create-task-btn"/>

    </div>

    <ul class="flex task_index_tasks_manager_section_lists_container_section_content_owner_task_to_do_list">

        @foreach($this->tasksOfTheDay() as $task)

            <livewire:todolist.owner-to-do-tasks-of-the-day-list-item :$task wire:key="owner-task-{{$task->id}}"/>

        @endforeach

        {{ $this->tasksOfTheDay()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

    </ul>

</div>

