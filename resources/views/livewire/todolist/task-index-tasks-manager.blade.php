<section class="section task_index_tasks_manager_section flex" x-data="{openToDo : @entangle('isToDoSectionVisible')}">

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

    <div class="task_index_tasks_manager_section_lists_container flex">

        <div class="task_index_tasks_manager_section_lists_container_section flex">

            <h2 class="hel_bold task_index_tasks_manager_section_lists_container_section_title" wire:click="toggleToDoSection">
                <span class="text_green">{{__('texts.todo_tasks')}}</span>
                <svg x-show="openToDo" width="22" height="18"
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
                <svg x-show="!openToDo" width="22" height="18"
                     viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
                    <path class="table_icon" d="M11 0L0.607697 18H21.3923L11 0Z"/>
                </svg>
            </h2>

            <div class="flex horizontal_flex" x-show="openToDo">

                <livewire:todolist.owner-to-do-tasks-of-the-day-list :$date/>

                <livewire:todolist.assigned-to-do-tasks-of-the-day-list :$date/>

            </div>

        </div>

        <div class="task_index_tasks_manager_section_lists_container_section flex">

            <h2 class="hel_bold task_index_tasks_manager_section_lists_container_section_title">
                <span class="text_orange">{{__('texts.in_process_tasks')}}</span>
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
            </h2>

            <div>



            </div>

        </div>

        <div class="task_index_tasks_manager_section_lists_container_section flex">

            <h2 class="hel_bold task_index_tasks_manager_section_lists_container_section_title">
                <span class="text_red">{{__('texts.archived_tasks')}}</span>
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
            </h2>

            <div>



            </div>

        </div>


    </div>

</section>
