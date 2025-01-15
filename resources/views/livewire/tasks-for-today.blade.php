<div class="tasks_for_today flex" x-data="{open : @entangle('isTaskForTodayOpen')}">

    <h3 class="hel_bold tasks_for_today_title" wire:click="openTaskForToday">
        Les tâches dont vous êtes le propriétaire
        <svg x-show="open" width="22" height="18"
             viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <style>
                    .table_icon {
                        fill: var(--white_color_switchable);
                    }
                </style>
            </defs>
            <path class="table_icon" d="M11 18L21.3923 0L0.607696 0L11 18Z"/>
        </svg>
        <svg x-show="!open" width="22" height="18"
             viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
            <path class="table_icon" d="M11 0L0.607697 18H21.3923L11 0Z"/>
        </svg>
    </h3>

    @if(count($this->tasks()) > 0)

        <ul class="todo_list_section_content_list flex" x-show="open">

            @foreach($this->tasks() as $task)

                <livewire:task-completed :$task wire:key="task-completed-{{$task->id}}"/>

            @endforeach

        </ul>

    @else

        <p class="hel_bold todo_list_section_content_no_tasks">{{__('texts.no_tasks_for_today')}}</p>

    @endif

    <div x-show="open">
        {{ $this->tasks()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}
    </div>

</div>
