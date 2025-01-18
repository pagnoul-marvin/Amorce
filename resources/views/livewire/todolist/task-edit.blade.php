<div class="div_space">

    <h2 class="section_title hel_bold">{{$form->title}}</h2>

    @if($task->user_id === Auth::id())

        <form wire:submit="updateTask" class="flex task_show_section_form">

            <x-layout.input-label-container id="title" class="task_show_section_form_label_and_input_container"
                                            :label="__('texts.title')">

                <input class="input" type="text" id="title" wire:model.live="form.title" required>

                @error('form.title')
                <x-input-error :messages="$errors->get('form.title')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="date" class="task_show_section_form_label_and_input_container"
                                            :label="__('texts.date_form')">

                <input class="input" type="date" id="date" wire:model.blur="form.date" required>

                @error('form.date')
                <x-input-error :messages="$errors->get('form.date')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="created_by" class="task_show_section_form_label_and_input_container"
                                            :label="__('texts.created_by')">

                <select class="input" id="created_by" wire:model.blur="form.user_id" required>

                    <option value="{{$task->user->id}}">
                        {{$task->user->firstname}} &ndash; {{$task->user->email}}</option>

                    @foreach($assigned_users as $user)

                        <option wire:key="added_user-{{$user->id}}" value="{{$user->id}}">
                            {{$user->firstname}} &ndash; {{$user->email}}</option>

                    @endforeach

                </select>

                @error('form.user_id')
                <x-input-error :messages="$errors->get('form.user_id')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="status" class="fund_details_section_form_label_and_input_container"
                                            :label="__('texts.status')">

                <select class="input" id="status" wire:model.blur="form.category" required>

                    <option class="option" value="{{\App\Enum\TaskCategories::Todo->value}}">{{__('texts.todo')}}</option>
                    <option class="option" value="{{\App\Enum\TaskCategories::InProgress->value}}">{{__('texts.in_process')}}</option>
                    <option class="option" value="{{\App\Enum\TaskCategories::Archived->value}}">{{__('texts.archived')}}</option>

                </select>

                @error('form.completed')
                <x-input-error :messages="$errors->get('form.completed')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="description" class="task_show_section_form_label_and_input_container"
                                            :label="__('texts.description')">

                <textarea class="input" id="description" rows="5" wire:model.blur="form.description"
                          required></textarea>

                @error('form.description')
                <x-input-error :messages="$errors->get('form.description')"/>
                @enderror

            </x-layout.input-label-container>
            <x-form.submit-button :text="__('texts.modify')"
                                  div_class="fund_details_section_form_label_and_input_container"
                                  btn_class="fund_details_section_form_submit_btn submit_btn button"/>

        </form>

    @else

        <ul class="flex task_show_section_list">

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.title')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">{{$task->title}}</p>
                </div>
            </li>

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.date')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">{{$task->date}}</p>
                </div>
            </li>

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.created_by')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">{{$task->user->firstname}} {{$task->user->lastname}} &ndash; {{$task->user->email}}</p>
                </div>
            </li>

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.status')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">
                        @if($task->category == \App\Enum\TaskCategories::Todo->value)
                            {{ __('texts.todo_tasks') }}
                        @elseif($task->category == \App\Enum\TaskCategories::InProgress->value)
                            {{ __('texts.in_process_tasks') }}
                        @elseif($task->category == \App\Enum\TaskCategories::Archived->value)
                            {{ __('texts.archived_tasks') }}
                        @else
                            ''
                        @endif</p>
                </div>
            </li>

            <li class="task_show_section_list_item">
                <div class="task_show_section_list_item_container flex">
                    <p class="hel_bold task_show_section_list_item_container_text">{{__('texts.description')}}</p>
                    <p class="hel_reg task_show_section_list_item_container_text">{{$task->description}}</p>
                </div>
            </li>

        </ul>

    @endif

</div>
