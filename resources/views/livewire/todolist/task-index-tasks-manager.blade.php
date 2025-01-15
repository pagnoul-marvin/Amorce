<section class="section task_index_tasks_manager_section flex">

    <div class="task_index_tasks_manager_section_title_and_buttons_container flex">

        <button type="button" class="circle-btn" wire:click="previousDay">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 class="icon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <h2 class="section_title hel_bold">{{$this->getFormattedDateProperty()}}</h2>

        <button type="button" class="circle-btn" wire:click="nextDay">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 class="icon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

    </div>

    <ul>

        @foreach($this->tasksOfTheDay() as $task)

            <li>{{$task->title}}</li>

        @endforeach

    </ul>

    {{ $this->tasksOfTheDay()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</section>
