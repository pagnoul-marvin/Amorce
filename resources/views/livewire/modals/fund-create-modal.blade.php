<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.create_fund')}}</h2>

            <livewire:icons.close to="modals.fund-create-modal" event="closeModal" wire:key="fund-create-modal-close-icon"/>

        </div>

        <form wire:submit="save" class="modal_section_content_form flex">

            <x-layout.input-label-container id="name" class="modal_section_content_form_input_label_container" :label="__('texts.name')">

                <input class="input" type="text" id="name" wire:model.blur="form.name" required value="{{old('form.name')}}">

                @error('form.name')
                <x-input-error :messages="$errors->get('form.name')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="pourcentage" class="modal_section_content_form_input_label_container" :label="__('texts.pourcentage')">

                <input class="input" type="number" id="pourcentage" wire:model.blur="form.pourcentage" required value="{{old('form.pourcentage')}}">

                @error('form.pourcentage')
                <x-input-error :messages="$errors->get('form.pourcentage')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="description" class="modal_section_content_form_input_label_container" :label="__('texts.description')">

                <textarea class="input" id="description" wire:model.blur="form.description" required value="{{old('form.description')}}"></textarea>

                @error('form.description')
                <x-input-error :messages="$errors->get('form.description')"/>
                @enderror

            </x-layout.input-label-container>

            <x-form.submit-button :text="__('texts.create')" div_class="modal_section_content_form_submit_btn_container" btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

        </form>

    </div>

    <livewire:success-message wire:key="fund-create-modal-success-message"/>

</section>
