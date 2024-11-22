<x-layout.main>

    <x-page-title-and-description :title="__('texts.home_page_title')" :description="__('texts.home_page_description')"
                                  :bold_part="$user->firstname"/>

    <div class="home_sections_container flex">

        <section class="todo_list_section section flex">

            <div class="todo_list_section_title_and_buttons flex section_title_and_button">

                <h2 class="section_title hel_bold">{{__('texts.todo_list_title')}}</h2>

                <x-buttons.link type="add" :title="__('texts.add_a_task_for_today')" href="#"/>

            </div>

            <div class="todo_list_section_content">

                @if(count($tasks) > 0)

                    <ul class="todo_list_section_content_list flex">
                        @foreach($tasks as $task)

                            <li class="todo_list_section_content_list_item flex">

                                <a href="" title="{{__('texts.see_details')}} {{$task->title}}"
                                   class="todo_list_section_content_list_item_link hel_reg">{{$task->title}}</a>

                                <ul class="todo_list_section_content_list_item_profile_pictures_list flex">

                                    @foreach($task->users->take(3) as $user)

                                        <li class="todo_list_section_content_list_item_profile_pictures_list_item">
                                            <img
                                                class="todo_list_section_content_list_item_profile_pictures_list_item_img"
                                                src="{{asset($user->picture)}}" alt="{{__('texts.profile_photo')}} {{$user->firstname}}"
                                                title="{{$user->firstname}} {{$user->lastname}} {{$user->email}}">
                                        </li>

                                    @endforeach

                                    @if(count($task->users) > 3)

                                        <li><p class="hel_reg">...</p></li>

                                    @endif

                                </ul>

                                <form action="{{route('tasks.completed', $task)}}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden" name="completed" value="{{ $task->completed ? 0 : 1 }}">

                                    <x-buttons.submit-button button_or_link="button_submit" type="checked"
                                                                   :title="__('texts.make_this_task_completed')"/>

                                </form>

                            </li>

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

    </div>

</x-layout.main>

