<div>
    <x-page-title-and-description :title="__('texts.your')" :description="__('texts.see_or_modify_your_profile')"
                                  :bold_part="__('texts.profile')"/>

    <section class="profile_form_section flex">

        <h2 class="hidden">{{ __('texts.profile_form') }}</h2>

        <div class="profile_form_section_profile_picture_container">
            <img src="{{ asset(Auth::user()->picture) }}" alt="{{ __('texts.profile_photo') }} {{ Auth::user()->firstname }}">
        </div>

        <form class="profile_form_section_form flex" wire:submit="save">

            <label for="firstname">Prénom :</label>
            <input type="text" wire:model.blur="form.firstname">
            @error('form.firstname') <span class="error">{{ $message }}</span> @enderror

            <label for="lastname">Nom :</label>
            <input type="text" wire:model.blur="form.lastname">
            @error('form.lastname') <span class="error">{{ $message }}</span> @enderror

            <label for="email">Mail</label>
            <input type="email" wire:model.blur="form.email">
            @error('form.email') <span class="error">{{ $message }}</span> @enderror

            <label for="password">Mot de passe</label>
            <input type="password" wire:model.blur="form.password">
            @error('form.password') <span class="error">{{ $message }}</span> @enderror

            <label for="picture">Photo de profil</label>
            <input type="file" wire:model.blur="form.picture">
            @error('form.picture') <span class="error">{{ $message }}</span> @enderror

            <x-form.submit-button :text="__('texts.modify')" :class="false"/>

        </form>

        <livewire:success-message :text="__('texts.profile_updated')"/>

    </section>
</div>
