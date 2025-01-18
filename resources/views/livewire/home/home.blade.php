<div>
    <x-page-title-and-description :title="__('texts.home_page_title')" :description="__('texts.home_page_description')"
                                  :bold_part="Auth::user()->firstname"/>

    <div class="home_sections_container flex">

        <section class="todo_list_section section flex space">

            <div class="todo_list_section_title_and_buttons flex section_title_and_button">

                <h2 class="section_title hel_bold">{{__('texts.todo_list_title')}}</h2>

                <livewire:buttons.modal-button type="add" :title="__('texts.add_a_task_for_today')"
                                               to="modals.task-create-for-today-modal" event="openModal"
                                               wire:key="task-create-for-today-modal-open-btn"/>

            </div>

            <div class="todo_list_section_content flex">

                <livewire:home.tasks-for-today/>

                <livewire:home.assigned-tasks-for-today/>

            </div>

        </section>

        <section class="section home_detente_section flex">

            <h2 class="section_title hel_bold">{{__('texts.actual_detente')}}</h2>

            <div class="home_detente_section_content">

                @if($actualDetente)

                    <ul class="flex home_detente_section_content_list">

                        @foreach($detenteUsers as $user)
                            <livewire:home.detente-user-list-item :$user wire-key="detente-user-{{$user->id}}"/>
                        @endforeach

                    </ul>

                @else

                    <p class="hel_reg">{{__('texts.no_detente')}}</p>

                @endif

            </div>

        </section>


    </div>

    <livewire:messages.success-message wire:key="task-completed-success-message"/>

    <livewire:modals.task-create-for-today-modal wire:key="task-create-for-today-modal"/>

</div>

