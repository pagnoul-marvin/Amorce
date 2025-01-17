<x-guest-layout>

    <section class="login_section flex">

        <h2 class="hidden">{{__('texts.reset_password_form')}}</h2>

        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <form action="{{route('forgot-password-send-email')}}" method="POST" class="flex login_section_form">

            @csrf

            <div class="login_section_form_label_and_input flex">

                <x-form.input class="login_section_form_content" type="email" id="email"
                              :label="__('texts.mail_address')"
                              :value="false"
                              placeholder="patrick@exemple.com" required/>

            </div>

            <div class="login_section_form_stay_connected_forgot_password_and_button flex">

                <x-form.submit-button :text="__('texts.send_email')"
                                      div_class="login_section_form_stay_connected_forgot_password_and_button_btn_container"
                                      btn_class="login_section_form_stay_connected_forgot_password_and_button_btn_container_btn submit_btn button"/>

            </div>

        </form>

    </section>

</x-guest-layout>
