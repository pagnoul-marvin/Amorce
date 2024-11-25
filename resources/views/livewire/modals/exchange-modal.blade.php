<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.perform_exchange')}}</h2>

            <livewire:icons.close to="modals.exchange-modal" event="closeModal"/>

        </div>

        <form action="" method="post" class="modal_section_content_form flex">

            @csrf

            <x-form.select-input type="text" id="from" :label="__('texts.from')" :placeholder="false" :value="false" required="required" class="modal_section_content_form_input_label_container">

                @foreach($users as $user)

                    <option class="option" value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>

                @endforeach

            </x-form.select-input>

            <x-form.select-input type="text" id="to" :label="__('texts.to')" :placeholder="false" :value="false" required="required" class="modal_section_content_form_input_label_container">

                @foreach($users as $user)

                    <option class="option" value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>

                @endforeach

            </x-form.select-input>

            <x-form.input type="number" id="amount" :label="__('texts.amount')" placeholder="10" :value="false" required="required" class="modal_section_content_form_input_label_container"/>

            <x-form.submit-button :text="__('texts.exchange')" class="modal_section_content_form_submit_btn button"/>

        </form>

    </div>

</section>

