<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.link_a_transaction_to_a_fund')}}</h2>

            <livewire:icons.close to="modals.link-a-transaction-to-a-fund-modal" event="closeModal"
                                  wire:key="link-a-transaction-to-a-fund-modal-close-icon"/>

        </div>

        @if(count($this->transactions) > 0)

            <div class="transaction_info flex">

                <div>

                    <p class="hel_bold transaction_info_title">{{__('texts.here_is_the_transaction_to_add')}}</p>

                    <dl class="flex transaction_info_texts_container hel_reg">

                        <div class="flex transaction_info_texts_container_text">
                            <dt>{{__('texts.date')}}&nbsp;:&nbsp;</dt>
                            <dd>{{$this->transactions[$transactionCounter][0]}}</dd>
                        </div>

                        <div class="flex transaction_info_texts_container_text">
                            <dt>{{__('texts.amount_table')}}&nbsp;:&nbsp;</dt>
                            <dd>{{$this->transactions[$transactionCounter][2]}}&euro;</dd>
                        </div>

                        <div class="flex transaction_info_texts_container_text">
                            <dt>{{__('texts.note')}}&nbsp;:&nbsp;</dt>
                            <dd>{{$this->transactions[$transactionCounter][8]}}</dd>
                        </div>

                    </dl>

                </div>

                <form wire:submit="save" class="modal_section_content_form flex">

                    <x-layout.input-label-container id="fund" class="modal_section_content_form_input_label_container"
                                                    :label="__('texts.funds_form')">

                        <select class="input" id="fund" wire:model.blur="form.fund_id" required>

                            <option class="option">{{__('texts.choose_a_fund')}}</option>

                            @foreach($funds as $fund)

                                <option class="option" value="{{$fund->id}}">{{$fund->name}}</option>

                            @endforeach

                        </select>

                        @error('form.fund_id')
                        <x-input-error :messages="$errors->get('form.fund_id')"/>
                        @enderror

                    </x-layout.input-label-container>

                    <input type="hidden" wire:model.blur="form.amount">
                    <input type="hidden" wire:model.blur="form.date">
                    <input type="hidden" wire:model.blur="form.note">
                    <input type="hidden" wire:model.blur="form.hash">

                    @if(\App\Models\User::where('IBAN', $IBAN)->exists())

                        <x-form.submit-button :text="__('texts.add')"
                                              div_class="modal_section_content_form_submit_btn_container"
                                              btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

                    @endif

                </form>

            </div>

        @endif

        @if(!\App\Models\User::where('IBAN', $IBAN)->exists())

            <div class="transaction_info flex">

                <p class="text_red hel_reg iban_alert">{{__('texts.alert_iban')}}</p>

                <form wire:submit="createUser" class="modal_section_content_form flex">

                    <x-layout.input-label-container id="firstname"
                                                    class="modal_section_content_form_input_label_container"
                                                    :label="__('texts.firstname')">

                        <input type="text" class="input" placeholder="Jean" id="firstname"
                               wire:model.blur="userForm.firstname" required>

                        @error('userForm.firstname')
                        <x-input-error :messages="$errors->get('userForm.firstname')"/>
                        @enderror

                    </x-layout.input-label-container>

                    <x-layout.input-label-container id="lastname"
                                                    class="modal_section_content_form_input_label_container"
                                                    :label="__('texts.lastname')">

                        <input type="text" class="input" placeholder="Pottier" id="lastname"
                               wire:model.blur="userForm.lastname" required>

                        @error('userForm.lastname')
                        <x-input-error :messages="$errors->get('userForm.lastname')"/>
                        @enderror

                    </x-layout.input-label-container>

                    <x-layout.input-label-container id="email" class="modal_section_content_form_input_label_container"
                                                    :label="__('texts.mail_address')">

                        <input type="email" placeholder="jean@example.com" class="input" id="email"
                               wire:model.blur="userForm.email" required>

                        @error('userForm.email')
                        <x-input-error :messages="$errors->get('userForm.email')"/>
                        @enderror

                    </x-layout.input-label-container>

                    <x-layout.input-label-container id="password"
                                                    class="modal_section_content_form_input_label_container"
                                                    :label="__('texts.password')">

                        <div class="input_error_message flex">

                            <input class="input" type="{{$showPassword ? 'text' : 'password'}}" id="password"
                                   wire:model.blur="userForm.password"
                                   placeholder="ch4nge_th1s" required value="{{old('userForm.password')}}">

                            <button type="button" wire:click="togglePasswordVisibility"
                                    class="input_error_message_show_password_button">

                                @if($showPassword)

                                    <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 24.5 18.5">
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
                                        <path class="cls-3"
                                              d="M1.25,9.25S5.25,1.25,12.25,1.25s11,8,11,8c0,0-4,8-11,8S1.25,9.25,1.25,9.25Z"/>
                                        <path class="cls-3"
                                              d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
                                        <line class="cls-3" x1="1.25" y1="1.25" x2="23.25" y2="17.25"/>
                                    </svg>

                                @else

                                    <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 24.5 18.5">
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
                                        <path class="cls-3"
                                              d="M1.25,9.25S5.25,1.25,12.25,1.25s11,8,11,8c0,0-4,8-11,8S1.25,9.25,1.25,9.25Z"/>
                                        <path class="cls-3"
                                              d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
                                    </svg>

                                @endif

                            </button>

                        </div>

                        @error('userForm.password')
                        <x-input-error :messages="$errors->get('userForm.password')"/>
                        @enderror

                    </x-layout.input-label-container>

                    <x-layout.input-label-container id="role" class="modal_section_content_form_input_label_container"
                                                    :label="__('texts.role')">

                        <select class="input" id="role" required wire:model.blur="userForm.role">

                            <option class="option">{{__('texts.choose_a_role')}}</option>

                            @foreach(\App\Enum\UserRoles::values() as $role)

                                <option value="{{$role}}" wire:key="role-{{$role}}">{{$role}}</option>

                            @endforeach

                        </select>

                        @error('userForm.role')
                        <x-input-error :messages="$errors->get('userForm.role')"/>
                        @enderror

                    </x-layout.input-label-container>

                    <x-form.submit-button :text="__('texts.create')"
                                          div_class="modal_section_content_form_submit_btn_container"
                                          btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

                </form>

            </div>

        @endif

    </div>

</section>

