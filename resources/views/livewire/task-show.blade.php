<div>

    <x-page-title-and-description :title="__('texts.the_task')" :description="__('texts.see_and_modify_the_task')"
                                  :bold_part="$task_form->title"/>

    <livewire:navigations.go-back-nav :text="__('texts.go_back')" :href="route('home')"/>

    <section class="section space_up space task_show_section flex">

        <h2 class="section_title hel_bold">{{$task_form->title}}</h2>

        <form wire:submit="saveTask" class="flex task_show_section_form">

            <x-layout.input-label-container id="title" class="task_show_section_form_label_and_input_container"
                                            :label="__('texts.title')">

                <input class="input" type="text" id="title" wire:model.live="task_form.title" required>

                @error('task_form.title')
                <x-input-error :messages="$errors->get('task_form.title')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="date" class="task_show_section_form_label_and_input_container"
                                            :label="__('texts.date_form')">

                <input class="input" type="date" id="date" wire:model.blur="task_form.date" required>

                @error('task_form.date')
                <x-input-error :messages="$errors->get('task_form.date')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="description" class="task_show_section_form_label_and_input_container"
                                            :label="__('texts.description')">

                <textarea class="input" id="description" rows="5" wire:model.blur="task_form.description"
                          required></textarea>

                @error('task_form.description')
                <x-input-error :messages="$errors->get('task_form.description')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="created_by" class="task_show_section_form_label_and_input_container"
                                            :label="__('texts.created_by')">

                <select class="input" id="created_by" wire:model.blur="task_form.user_id" required>

                    <option value="{{$owner->id}}">{{$owner->firstname}} &ndash; {{$owner->email}}</option>

                    @foreach($assigned_users as $user)

                        <option wire:key="added_user-{{$user->id}}" value="{{$user->id}}">
                            {{$user->firstname}} &ndash; {{$user->email}}</option>

                    @endforeach

                </select>

                @error('task_form.user_id')
                <x-input-error :messages="$errors->get('task_form.user_id')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="status" class="fund_details_section_form_label_and_input_container"
                                            :label="__('texts.status')">

                <select class="input" id="status" wire:model.blur="task_form.completed" required>

                    <option class="option"
                            value="0">{{$task->completed ? __('texts.enclosed') : __('texts.open')}}</option>
                    <option class="option"
                            value="1">{{$task->completed ? __('texts.open') : __('texts.enclosed')}}</option>

                </select>

                @error('task_form.completed')
                <x-input-error :messages="$errors->get('task_form.completed')"/>
                @enderror

            </x-layout.input-label-container>
            <x-form.submit-button :text="__('texts.modify')"
                                  div_class="fund_details_section_form_label_and_input_container"
                                  btn_class="fund_details_section_form_submit_btn submit_btn button"/>

        </form>

        @if(count($assigned_users) > 0)

            <div class="task_users_form_users_list_container">

                <p class="hel_bold task_users_form_users_list_container_title">{{__('texts.users_added')}}</p>

                <ul class="task_users_form_users_list flex">

                    @foreach($assigned_users as $user)

                        <li class="task_users_form_users_list_item flex" wire:key="picture-added-user-{{$user->id}}">

                            <img
                                class="task_users_form_users_list_item_picture"
                                src="{{ $user->picture ? asset('users/'.$user->id.'/picture/'.basename($user->picture)) : asset('img/photo_profile.jpg') }}"
                                alt="{{ __('texts.profile_photo') }} {{ $user->firstname }}"
                                title="{{ $user->firstname }} {{ $user->lastname }} {{ $user->email }}">

                            <span class="task_users_form_users_list_item_name hel_reg">
                            {{$user->firstname}} {{$user->lastname}}
                        </span>

                            <form wire:submit="deleteTaskUsers({{$user->id}})" class="task_users_form_users_list_item_form">

                                <input type="hidden" wire:model.blur="task_users_form.task_id">

                                <x-form.submit-button :text="__('texts.delete')"
                                                      div_class="task_users_form_users_list_item_form_submit_btn_container"
                                                      btn_class="task_users_form_users_list_item_form_submit_btn_container_btn submit_btn button"/>

                            </form>

                        </li>

                    @endforeach
                </ul>

            </div>

        @endif

        @if(count($all_users) > 0)

            <div class="task_users_form_users_list_container">

                <p class="hel_bold task_users_form_users_list_container_title">{{__('texts.users_can_be_added')}}</p>

                <ul class="task_users_form_users_list flex">

                    @foreach($all_users as $user)

                        <li class="task_users_form_users_list_item flex" wire:key="picture-added-user-{{$user->id}}">

                            <img
                                class="task_users_form_users_list_item_picture"
                                src="{{ $user->picture ? asset('users/'.$user->id.'/picture/'.basename($user->picture)) : asset('img/photo_profile.jpg') }}"
                                alt="{{ __('texts.profile_photo') }} {{ $user->firstname }}"
                                title="{{ $user->firstname }} {{ $user->lastname }} {{ $user->email }}">

                            <span class="task_users_form_users_list_item_name hel_reg">
                            {{$user->firstname}} {{$user->lastname}}
                        </span>

                            <form wire:submit="addTaskUsers({{$user->id}})" class="task_users_form_users_list_item_form">

                                <input type="hidden" wire:model.blur="task_users_form.task_id">

                                <x-form.submit-button :text="__('texts.add')"
                                                      div_class="task_users_form_users_list_item_form_submit_btn_container"
                                                      btn_class="task_users_form_users_list_item_form_submit_btn_container_btn submit_btn button"/>

                            </form>

                        </li>

                    @endforeach
                </ul>

            </div>

        @endif

    </section>

    <livewire:messages.success-message wire:key="task-update-success-message"/>

</div>
