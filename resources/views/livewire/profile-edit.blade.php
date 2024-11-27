<div>
    <x-page-title-and-description :title="__('texts.your')" :description="__('texts.see_or_modify_your_profile')"
                                  :bold_part="__('texts.profile')"/>

    <section class="profile_form_section flex">

        <h2 class="hidden">{{ __('texts.profile_form') }}</h2>

        <div class="profile_form_section_profile_picture_container">
            <img src="{{ asset(Auth::user()->picture) }}"
                 alt="{{ __('texts.profile_photo') }} {{ Auth::user()->firstname }}">
        </div>

        <form class="profile_form_section_form flex" wire:submit="save">

            <x-layout.input-label-container id="firstname" class="profile_form_section_form_label_and_input_container" :label="__('texts.firstname')">

                <input class="input" type="text" id="firstname" wire:model.blur="form.firstname"
                       required value="{{old('form.firstname')}}">

                @error('form.firstname')
                <x-input-error :messages="$errors->get('form.firstname')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="lastname" class="profile_form_section_form_label_and_input_container" :label="__('texts.lastname')">

                <input class="input" type="text" id="lastname" wire:model.blur="form.lastname"
                       required value="{{old('form.lastname')}}">

                @error('form.lastname')
                <x-input-error :messages="$errors->get('form.lastname')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="email" class="profile_form_section_form_label_and_input_container" :label="__('texts.mail_address')">

                <input class="input" type="email" id="email" wire:model.blur="form.email"
                       required value="{{old('form.email')}}">

                @error('form.email')
                <x-input-error :messages="$errors->get('form.email')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="password" class="profile_form_section_form_label_and_input_container" :label="__('texts.password')">

                <input class="input" type="password" id="password" wire:model.blur="form.password"
                       required value="{{old('form.password')}}">

                @error('form.password')
                <x-input-error :messages="$errors->get('form.password')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="picture" class="profile_form_section_form_label_and_input_container" :label="__('texts.profile_photo_form')">

                <input class="input" type="file" id="picture" value="{{old('form.picture')}}">

                @error('form.picture')
                <x-input-error :messages="$errors->get('form.picture')"/>
                @enderror

            </x-layout.input-label-container>

            <x-form.submit-button :text="__('texts.modify')" div_class="profile_form_section_form_label_and_input_container" btn_class="profile_form_section_form_submit_btn submit_btn button"/>

        </form>

        <livewire:success-message/>

    </section>
</div>
