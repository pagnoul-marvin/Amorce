<div class="stay_connected_forgot_password flex">

    <x-form.input class="input_checkbox" type="checkbox" id="remember" :label="__('texts.stay_connected')"
                            :value="false" :placeholder="false" :required="false"/>

    <a href="{{route('forgot-password')}}" title="Réinitialiser mon mot de passe"
       class="forgot_password hel_reg">{{__('texts.forgot_password')}}</a>

</div>
