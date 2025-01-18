<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.create_detente')}}</h2>

            <livewire:icons.close to="modals.create-detente-modal" event="closeModal" wire:key="detente-create-modal-close-icon"/>

        </div>

        <form wire:submit="save" class="modal_section_content_form flex">

            <x-layout.input-label-container id="starting_at" class="modal_section_content_form_input_label_container" :label="__('texts.starting_at')">

                <input class="input" type="date" id="starting_at" wire:model.blur="form.starting_at" required value="{{old('form.starting_at')}}">

                @error('form.starting_at')
                <x-input-error :messages="$errors->get('form.starting_at')"/>
                @enderror

            </x-layout.input-label-container>

            <x-layout.input-label-container id="ending_at" class="modal_section_content_form_input_label_container" :label="__('texts.ending_at')">

                <input class="input" type="date" id="ending_at" wire:model.blur="form.ending_at" required value="{{old('form.ending_at')}}">

                @error('form.ending_at')
                <x-input-error :messages="$errors->get('form.ending_at')"/>
                @enderror

            </x-layout.input-label-container>


            <x-form.submit-button :text="__('texts.create')" div_class="modal_section_content_form_submit_btn_container" btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

        </form>

    </div>

</section>
