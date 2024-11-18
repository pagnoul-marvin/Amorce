<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="add-fund-transition"
         x-transition:enter-start="add-fund-enter"
         x-transition:enter-end="add-fund-enter-active"
         x-transition:leave="add-fund-transition"
         x-transition:leave-start="add-fund-leave"
         x-transition:leave-end="add-fund-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.create_fund')}}</h2>

            <livewire:icons.close to="modals.add-fund-modal" event="closeModal"/>

        </div>

        <form action="" method="post" class="modal_section_content_form flex">

            @csrf

            <x-form.label-and-input type="text" id="name" :label="__('texts.name')" placeholder="ASBL SEF" :value="false" required="required" class="modal_section_content_form_input_label_container"/>
            <x-form.label-and-input type="number" id="pourcentage" :label="__('texts.pourcentage')" placeholder="10" :value="false" required="required" class="modal_section_content_form_input_label_container"/>
            <x-form.label-and-input type="textarea" id="description" :label="__('texts.description')" placeholder="Le fond ... est le fond qui sert à ..." :value="false" required="required" class="modal_section_content_form_input_label_container"/>
            <x-form.submit-button :text="__('texts.create')" class="modal_section_content_form_submit_btn button"/>

        </form>

    </div>

</section>
