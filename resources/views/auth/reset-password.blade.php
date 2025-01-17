<x-guest-layout>

    <section class="login_section flex">

        <h2 class="hidden">{{__('texts.reset_password_form')}}</h2>

        <form action="{{ route('password.store')}}" method="POST" class="flex login_section_form">

            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="login_section_form_label_and_input flex">

                <x-form.input class="login_section_form_content" type="email" id="email"
                              :label="__('texts.mail_address')"
                              :value="old('email', $request->email)"
                              placeholder="patrick@exemple.com" required/>

                <livewire:show-password
                    id="password"
                    :label="__('texts.new_password')"
                    :value="false"
                    class="login_section_form_content"/>

                <livewire:show-password
                    id="password_confirmation"
                    :label="__('texts.confirm_new_password')"
                    :value="false"
                    class="login_section_form_content"/>

            </div>

            <div class="login_section_form_stay_connected_forgot_password_and_button flex">

                <x-form.submit-button :text="__('texts.confirm')" div_class="login_section_form_stay_connected_forgot_password_and_button_btn_container" btn_class="login_section_form_stay_connected_forgot_password_and_button_btn_container_btn submit_btn button"/>

            </div>

        </form>

    </section>

</x-guest-layout>
