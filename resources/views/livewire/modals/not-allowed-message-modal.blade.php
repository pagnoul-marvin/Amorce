<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content error_modal flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.fund_error')}}</h2>

            <livewire:icons.close to="modals.not-allowed-message-modal" event="closeModal" wire:key="not-allowed-message-modal-close-icon"/>

        </div>

        <p class="hel_reg modal_error_text">{{$text}}</p>

        <button class="modal_section_content_form_submit_btn_container_submit_btn button" wire:click="closeNotAllowedMessageModal">{{__('texts.understand')}}</button>

    </div>

</section>

