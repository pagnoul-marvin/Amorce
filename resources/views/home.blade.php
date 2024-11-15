<x-layout.main>

    <x-page-title-and-description :title="__('texts.home_page_title')" :description="__('texts.home_page_description')"
                                  :model="$user->firstname"/>

    <div class="home_sections_container flex">

        <section class="todo_list_section section flex">

            <div class="todo_list_section_title_and_buttons section_title_and_button">

                <h2 class="section_title hel_bold">{{__('texts.todo_list_title')}}</h2>

            </div>

            <div class="todo_list_section_content">

                <ul class="todo_list_section_content_list flex">
                    @foreach($tasks as $task)

                        <li class="todo_list_section_content_list_item flex">

                            <a href="" title="" class="todo_list_section_content_list_item_link hel_reg">{{$task->title}}</a>

                            <ul class="todo_list_section_content_list_item_profile_pictures_list flex">

                                @foreach($task->users as $user)

                                    <li class="todo_list_section_content_list_item_profile_pictures_list_item">{{$user->firstname}}</li>

                                    @if(count($task->users) > 3)

                                        <li><p>...</p></li>

                                    @endif

                                @endforeach

                            </ul>

                            <button>Checked</button>

                        </li>

                    @endforeach
                </ul>

            </div>

        </section>

        <section></section>

    </div>

</x-layout.main>

