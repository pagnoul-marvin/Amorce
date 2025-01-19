 <section class="section flex create_user_section space">

    <h2 class="section_title hel_bold">{{__('texts.create_user')}}</h2>

    <form wire:submit="save" class="flex profile_form_section_form">

        <x-layout.input-label-container id="firstname"
                                        class="input_label_container profile_form_section_form_label_and_input_container flex"
                                        :label="__('texts.firstname')">

            <input class="input" type="text" id="firstname" wire:model.blur="form.firstname" placeholder="Jean"
                   required value="{{old('form.firstname')}}">

            @error('form.firstname')
            <x-input-error :messages="$errors->get('form.firstname')"/>
            @enderror

        </x-layout.input-label-container>
        <x-layout.input-label-container id="lastname"
                                        class="input_label_container profile_form_section_form_label_and_input_container flex"
                                        :label="__('texts.lastname')">

            <input class="input" type="text" id="lastname" wire:model.blur="form.lastname" placeholder="Pottier"
                   required value="{{old('form.lastname')}}">

            @error('form.lastname')
            <x-input-error :messages="$errors->get('form.lastname')"/>
            @enderror

        </x-layout.input-label-container>
        <x-layout.input-label-container id="email"
                                        class="input_label_container profile_form_section_form_label_and_input_container flex"
                                        :label="__('texts.mail_address')">

            <input class="input" type="email" id="email" wire:model.blur="form.email" placeholder="jean@example.com"
                   required value="{{old('form.email')}}">

            @error('form.email')
            <x-input-error :messages="$errors->get('form.email')"/>
            @enderror

        </x-layout.input-label-container>
        <x-layout.input-label-container id="phone"
                                        class="input_label_container profile_form_section_form_label_and_input_container flex"
                                        :label="__('texts.phone')">

            <input class="input" type="text" id="phone" wire:model.blur="form.phone" placeholder="0123456789"
                   required value="{{old('form.phone')}}">

            @error('form.phone')
            <x-input-error :messages="$errors->get('form.phone')"/>
            @enderror

        </x-layout.input-label-container>
        <x-layout.input-label-container id="password"
                                        class="input_label_container profile_form_section_form_label_and_input_container flex"
                                        :label="__('texts.password')">

            <div class="input_error_message flex">

                <input class="input" type="{{$showPassword ? 'text' : 'password'}}" id="password"
                       wire:model.blur="form.password"
                       placeholder="ch4nge_th1s" required value="{{old('form.password')}}">

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
                            <path class="cls-3" d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
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
                            <path class="cls-3" d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
                        </svg>

                    @endif

                </button>

            </div>

            @error('form.password')
            <x-input-error :messages="$errors->get('form.password')"/>
            @enderror

        </x-layout.input-label-container>
        <x-layout.input-label-container id="IBAN"
                                        class="input_label_container profile_form_section_form_label_and_input_container flex"
                                        :label="__('texts.iban')">

                <input class="input" type="text" id="IBAN"
                       wire:model.blur="form.IBAN"
                       placeholder="BE68 5390 0754 7034" required value="{{old('form.IBAN')}}">

            @error('form.IBAN')
            <x-input-error :messages="$errors->get('form.IBAN')"/>
            @enderror

        </x-layout.input-label-container>
        <x-layout.input-label-container id="role"
                                        class="input_label_container profile_form_section_form_label_and_input_container flex"
                                        :label="__('texts.role')">

            <select class="input" wire:model.blur="form.role" id="role">

                <option value="" class="option">{{__('texts.choose_a_role')}}</option>

                @foreach(\App\Enum\UserRoles::values() as $value)

                    <option value="{{$value}}" class="option" wire:key="{{$value}}">{{$value}}</option>

                @endforeach

            </select>

            @error('form.role')
            <x-input-error :messages="$errors->get('form.role')"/>
            @enderror

        </x-layout.input-label-container>

        <x-form.submit-button div_class="profile_form_section_form_label_and_input_container"
                              btn_class="button submit_btn" :text="__('texts.create')"/>

    </form>

</section>
