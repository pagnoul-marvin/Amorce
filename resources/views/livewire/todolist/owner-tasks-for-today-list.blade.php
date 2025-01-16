<ul class="flex task_index_tasks_manager_section_lists_container_owner_task_list">

    @foreach($this->tasksOfTheDay() as $task)

        <livewire:todolist.owner-tasks-for-today-list-item :$task wire:key="owner-task-{{$task->id}}"/>

    @endforeach

    {{ $this->tasksOfTheDay()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</ul>
