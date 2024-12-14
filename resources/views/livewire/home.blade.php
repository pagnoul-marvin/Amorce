<div>
    <x-page-title-and-description :title="__('texts.home_page_title')" :description="__('texts.home_page_description')"
                                  :bold_part="Auth::user()->firstname"/>

    <div class="home_sections_container flex">

        <section class="todo_list_section section flex">

            <div class="todo_list_section_title_and_buttons flex section_title_and_button">

                <h2 class="section_title hel_bold">{{__('texts.todo_list_title')}} ({{count($tasks)}} items)</h2>

                <livewire:buttons.modal-button type="add" :title="__('texts.add_a_task_for_today')"
                                               to="modals.task-create-for-today-modal" event="openModal" wire:key="task-create-for-today-modal-open-btn"/>

            </div>

            <div class="todo_list_section_content">

                @if(count($this->tasks) > 0)

                    <ul class="todo_list_section_content_list flex">
                        @foreach($this->tasks as $task)

                            <livewire:task-completed :$task wire:key="task-completed-{{$task->id}}"/>

                        @endforeach
                    </ul>

                @else

                    <p class="hel_bold todo_list_section_content_no_tasks">{{__('texts.no_tasks_for_today')}}</p>

                @endif

            </div>

        </section>

        <section class="section">

            <h2 class="section_title hel_bold">{{__('texts.actual_detente')}}</h2>

            <ul>


            </ul>

        </section>

        <livewire:messages.success-message wire:key="task-completed-success-message"/>

    </div>

    <livewire:modals.task-create-for-today-modal wire:key="task-create-for-today-modal"/>

</div>

