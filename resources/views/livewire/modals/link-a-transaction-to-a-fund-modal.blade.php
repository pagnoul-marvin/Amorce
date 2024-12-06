<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.link_a_transaction_to_a_fund')}}</h2>

            <livewire:icons.close to="modals.link-a-transaction-to-a-fund-modal" event="closeModal" wire:key="link-a-transaction-to-a-fund-modal-close-icon"/>

        </div>

            @foreach($transactionsNeedToBeLinked as $transaction)

                <form wire:submit="save" class="modal_section_content_form flex">

                    <x-layout.input-label-container id="fund" class="modal_section_content_form_input_label_container" :label="__('texts.funds_form')">

                        <select class="input" id="fund" wire:model.blur="form.fund_id" required>

                            @foreach($funds as $fund)

                                <option class="option" value="{{$fund->id}}">{{$fund->name}}</option>

                            @endforeach

                        </select>

                        @error('form.fund_id')
                        <x-input-error :messages="$errors->get('form.fund_id')"/>
                        @enderror

                    </x-layout.input-label-container>

                    <x-form.submit-button :text="__('texts.add')" div_class="modal_section_content_form_submit_btn_container" btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

                </form>

            @endforeach

    </div>

</section>

