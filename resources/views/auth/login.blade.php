<x-guest-layout>

    <section class="login_section flex">

        <h2 class="hidden">{{__('texts.connexion_form')}}</h2>

        <form action="{{route('login')}}" method="POST" class="flex login_section_form">

            @csrf

            <div class="login_section_form_label_and_input flex">

                <x-form.label-and-input class="login_section_form_content" type="email" id="email"
                                        :label="__('texts.mail_address')"
                                        placeholder="patrick@exemple.com" required/>

                <livewire:show-password
                    id="password"
                    :label="__('texts.password')"
                    :placeholder="false"
                    required="required"
                    class="login_section_form_content" />

            </div>

            <div class="login_section_form_stay_connected_forgot_password_and_button flex">

                <x-form.stay-connected-and-forgot-password/>

                <x-form.submit-button :text="__('texts.sign_in')" class="submit_btn button"/>

            </div>

        </form>

    </section>

</x-guest-layout>
