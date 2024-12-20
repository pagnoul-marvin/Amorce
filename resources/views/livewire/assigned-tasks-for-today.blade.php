<div class="assigned_tasks_for_today flex">

    <h3 class="hel_bold assigned_tasks_for_today_title">Les tâches où vous avez été assigné</h3>

    @if(count($this->assignedTasks()))

        <ul>

            @foreach($this->assignedTasks() as $assigned_task)

                <livewire:home-assigned-tasks :$assigned_task wire:key="assigned-task-{{$assigned_task->id}}"/>

            @endforeach

        </ul>

    @else

        <p class="hel_bold todo_list_section_content_no_tasks">Vous n'avez été assigné à aucune tâche pour aujourd'hui</p>

    @endif

    {{ $this->assignedTasks()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</div>
