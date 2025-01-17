<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.modify_password')}}</h2>

            <livewire:icons.close to="modals.modify-profile-password-modal" event="closeModifyProfilePasswordModal"
                                  wire:key="modify-profile-password-modal-close-icon"/>

        </div>

        <form wire:submit="save" class="modal_section_content_form flex">

            <x-layout.input-label-container id="old_password" class="profile_form_section_form_label_and_input_container"
                                            :label="__('texts.old_password')">

                <div class="input_error_message flex">

                    <input class="input" type="{{$showOldPassword ? 'text' : 'password'}}" id="old_password" wire:model.blur="form.old_password"
                           required value="{{old('form.old_password')}}">

                    <button type="button" wire:click="toggleOldPasswordVisibility" class="input_error_message_show_password_button">

                        @if($showOldPassword)

                            <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.5 18.5">
                                <defs>
                                    <style>
                                        .cls-3 {
                                            fill: none;
                                            stroke: var(--white_color_switchable);
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                            stroke-width: 2.5px;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-3" d="M1.25,9.25S5.25,1.25,12.25,1.25s11,8,11,8c0,0-4,8-11,8S1.25,9.25,1.25,9.25Z"/>
                                <path class="cls-3" d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
                                <line class="cls-3" x1="1.25" y1="1.25" x2="23.25" y2="17.25"/>
                            </svg>

                        @else

                            <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.5 18.5">
                                <defs>
                                    <style>
                                        .cls-3 {
                                            fill: none;
                                            stroke: var(--white_color_switchable);
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                            stroke-width: 2.5px;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-3" d="M1.25,9.25S5.25,1.25,12.25,1.25s11,8,11,8c0,0-4,8-11,8S1.25,9.25,1.25,9.25Z"/>
                                <path class="cls-3" d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
                            </svg>

                        @endif

                    </button>

                </div>

                @error('form.old_password')
                <x-input-error :messages="$errors->get('form.old_password')"/>
                @enderror

            </x-layout.input-label-container>

            <x-layout.input-label-container id="new_password" class="profile_form_section_form_label_and_input_container"
                                            :label="__('texts.new_password')">

                <div class="input_error_message flex">

                    <input class="input" type="{{$showNewPassword ? 'text' : 'password'}}" id="new_password" wire:model.blur="form.new_password"
                           required value="{{old('form.new_password')}}">

                    <button type="button" wire:click="toggleNewPasswordVisibility" class="input_error_message_show_password_button">

                        @if($showNewPassword)

                            <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.5 18.5">
                                <defs>
                                    <style>
                                        .cls-3 {
                                            fill: none;
                                            stroke: var(--white_color_switchable);
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                            stroke-width: 2.5px;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-3" d="M1.25,9.25S5.25,1.25,12.25,1.25s11,8,11,8c0,0-4,8-11,8S1.25,9.25,1.25,9.25Z"/>
                                <path class="cls-3" d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
                                <line class="cls-3" x1="1.25" y1="1.25" x2="23.25" y2="17.25"/>
                            </svg>

                        @else

                            <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.5 18.5">
                                <defs>
                                    <style>
                                        .cls-3 {
                                            fill: none;
                                            stroke: var(--white_color_switchable);
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                            stroke-width: 2.5px;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-3" d="M1.25,9.25S5.25,1.25,12.25,1.25s11,8,11,8c0,0-4,8-11,8S1.25,9.25,1.25,9.25Z"/>
                                <path class="cls-3" d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
                            </svg>

                        @endif

                    </button>

                </div>

                @error('form.new_password')
                <x-input-error :messages="$errors->get('form.new_password')"/>
                @enderror

            </x-layout.input-label-container>

            <x-form.submit-button :text="__('texts.create')"
                                  div_class="modal_section_content_form_submit_btn_container"
                                  btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

        </form>

    </div>

    <livewire:messages.success-message wire:key="task-create-for-today-modal-success-message"/>

</section>

