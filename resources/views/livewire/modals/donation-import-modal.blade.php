<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.import')}}</h2>

            <livewire:icons.close to="modals.donation-import-modal" event="closeModal" wire:key="donation-import-modal-close-icon"/>

        </div>

        <form wire:submit="save" class="modal_section_content_form flex" enctype="multipart/form-data">

            <x-layout.input-label-container id="csv" class="modal_section_content_form_input_label_container" :label="__('texts.file')">

                <input class="input" type="file" id="csv" required wire:model.blur="form.csv">

                @error('form.csv')
                <x-input-error :messages="$errors->get('form.csv')"/>
                @enderror

            </x-layout.input-label-container>
            <x-form.submit-button :text="__('texts.import_btn')" div_class="modal_section_content_form_submit_btn_container" btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

        </form>

    </div>

    <livewire:success-message wire:key="donation-import-modal-success-message"/>

</section>

