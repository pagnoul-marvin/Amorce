<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.add_a_task_for_today')}}</h2>

            <livewire:icons.close to="modals.task-create-for-today-modal" event="closeModal"
                                  wire:key="task-create-for-today-modal-close-icon"/>

        </div>

        <form wire:submit="save" class="modal_section_content_form flex">

            <x-layout.input-label-container id="title" class="modal_section_content_form_input_label_container"
                                            :label="__('texts.title')">

                <input class="input" id="title" wire:model.blur="form.title" placeholder="{{__('texts.smth')}}" required
                       value="{{old('form.title')}}">

                @error('form.title')
                <x-input-error :messages="$errors->get('form.title')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="description" class="modal_section_content_form_input_label_container"
                                            :label="__('texts.description')">

                <textarea class="input" id="description" wire:model.blur="form.description"
                          placeholder="{{__('texts.do_smth')}}" required value="{{old('form.description')}}"></textarea>

                @error('form.description')
                <x-input-error :messages="$errors->get('form.description')"/>
                @enderror

            </x-layout.input-label-container>
            <div class="form_user_list_container flex">

                <p class="hel_bold form_user_list_container_title">{{__('texts.contenders')}}</p>

                <label class="hidden" for="search">{{__('texts.search')}}</label>
                <input class="search_form_input" placeholder="{{__('texts.search')}}" type="text" id="search"
                       name="search" wire:model.live="search">

                <ul class="form_user_list flex">

                    @foreach($users as $user)

                        <li wire:key="task-create-for-today-user-{{$user->id}}" class="form_user_list_item flex">

                            <input type="checkbox" id="user-{{$user->id}}" wire:model.blur="form.participants" value="{{$user->id}}">
                            <label for="user-{{$user->id}}" class="flex form_user_list_item_label">

                                <div class="form_user_list_item_label_role">

                                    <p class="hel_reg_it">{{$user->role}}</p>

                                </div>

                                <div class="form_user_list_item_label_username_and_picture_container flex">

                                    <img class="form_user_list_item_label_username_and_picture_container_picture"
                                         src="{{asset($user->picture)}}"
                                         alt="{{__('texts.profile_photo')}} {{$user->firstname}}">
                                    <p class="hel_reg">{{$user->firstname}} {{$user->lastname}}</p>

                                </div>

                            </label>

                        </li>

                    @endforeach

                </ul>

            </div>

            <x-form.submit-button :text="__('texts.create')"
                                  div_class="modal_section_content_form_submit_btn_container"
                                  btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

        </form>

    </div>

    <livewire:success-message wire:key="task-create-for-today-modal-success-message"/>

</section>
