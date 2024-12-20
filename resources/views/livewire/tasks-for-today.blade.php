<div class="tasks_for_today flex">

    <h3 class="hel_bold tasks_for_today_title">Les tâches dont vous êtes le propriétaire</h3>

    @if(count($this->tasks()) > 0)

        <ul class="todo_list_section_content_list flex">

            @foreach($this->tasks() as $task)

                <livewire:task-completed :$task wire:key="task-completed-{{$task->id}}"/>

            @endforeach

        </ul>

    @else

        <p class="hel_bold todo_list_section_content_no_tasks">{{__('texts.no_tasks_for_today')}}</p>

    @endif

    {{ $this->tasks()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</div>
