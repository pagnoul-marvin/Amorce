<x-layout.main>

    <x-page-title-and-description :title="__('texts.your')" :description="__('texts.see_or_modify_your_profile')"
                                  :bold_part="__('texts.profile')"/>

    <section class="profile_form_section flex">

        <h2 class="hidden">{{__('texts.profile_form')}}</h2>

        <div class="profile_form_section_profile_picture_container">

            <img src="{{asset($user->picture)}}" alt="{{__('texts.profile_photo')}} {{$user->firstname}}">

        </div>

        <form class="profile_form_section_form flex" enctype="multipart/form-data" action="{{route('profile.update')}}"
              method="POST">

            @csrf
            @method('PATCH')

            <x-form.label-and-input type="text" id="lastname" :label="__('texts.lastname')" :value="$user->lastname"
                                    :placeholder="false"
                                    required="required" class="profile_form_section_form_label_and_input_container"/>

            <x-form.label-and-input type="text" id="firstname" :label="__('texts.firstname')" :value="$user->firstname"
                                    :placeholder="false"
                                    required="required" class="profile_form_section_form_label_and_input_container"/>

            <x-form.label-and-input type="email" id="email" :label="__('texts.mail_address')" :value="$user->email"
                                    :placeholder="false"
                                    required="required" class="profile_form_section_form_label_and_input_container"/>

            <livewire:show-password id="password" :label="__('texts.password')" :value="$user->password"
                                    :placeholder="false" required="required"
                                    class="profile_form_section_form_label_and_input_container"/>

            <x-form.label-and-input type="file" id="picture" :label="__('texts.profile_photo_form')" :value="false"
                                    :placeholder="false"
                                    :required="false" class="profile_form_section_form_label_and_input_container"/>

            <x-form.submit-button :text="__('texts.modify')" class="submit_btn button"/>

        </form>

        <livewire:success-message :text="__('texts.profile_updated')"/>

    </section>


</x-layout.main>
