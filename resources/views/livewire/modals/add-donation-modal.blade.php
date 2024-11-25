<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.add_donation_manually')}}</h2>

            <livewire:icons.close to="modals.add-donation-modal" event="closeModal"/>

        </div>

        <form action="" method="post" class="modal_section_content_form flex">

            @csrf

            <x-form.input type="text" id="name" :label="__('texts.name')" placeholder="ASBL SEF" :value="false" required="required" class="modal_section_content_form_input_label_container"/>
            <x-form.input type="date" id="date" :label="__('texts.date')" :placeholder="false" :value="false" required="required" class="modal_section_content_form_input_label_container"/>
            <x-form.textarea-input id="communication" :label="__('texts.communication')" placeholder="Un petit don qui fait plaisir" :value="false" :required="false" class="modal_section_content_form_input_label_container"/>
            <x-form.submit-button :text="__('texts.add')" class="modal_section_content_form_submit_btn button"/>

        </form>

    </div>

</section>

