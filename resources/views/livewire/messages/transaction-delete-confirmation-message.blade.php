<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.are_u_sure')}}</h2>

            <livewire:icons.close to="messages.transaction-delete-confirmation-message" event="closeModal"
                                  wire:key="transaction-delete-confirmation-message-close-icon"/>

        </div>

        <div class="confirmation_choices flex">

            <form wire:submit="save" class="modal_section_content_form flex">

                <x-form.submit-button :text="__('texts.yes')"
                                      div_class="modal_section_content_form_submit_btn_container"
                                      btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

            </form>

            <button class="button no_btn hel_bold" wire:click="closeModal">{{__('texts.no')}}</button>

        </div>

    </div>

</section>
