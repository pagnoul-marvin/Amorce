<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    @if($detente)

        <div class="modal_section_content flex">

            <div class="modal_section_content_title_and_close_container flex">

                <h2 class="modal_section_content_title_and_close_container_title hel_bold">
                    {{__('texts.manage_this_detente')}}
                    <small class="small_black">({{\Carbon\Carbon::parse($detente->starting_at)->translatedFormat('l d F Y')}} &ndash; {{\Carbon\Carbon::parse($detente->ending_at)->translatedFormat('l d F Y')}}
                        )</small>
                </h2>

                <livewire:icons.close to="modals.manage-detente-modal" event="closeModal"
                                      wire:key="detente-manage-modal-close-icon"/>

            </div>

            <form wire:submit="save" class="modal_section_content_form flex">


                <x-form.submit-button :text="__('texts.confirm')"
                                      div_class="modal_section_content_form_submit_btn_container"
                                      btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

            </form>

        </div>

    @endif

</section>
