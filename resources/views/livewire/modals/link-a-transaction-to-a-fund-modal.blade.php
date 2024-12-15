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

            <livewire:icons.close to="modals.link-a-transaction-to-a-fund-modal" event="closeModal"
                                  wire:key="link-a-transaction-to-a-fund-modal-close-icon"/>

        </div>

        @if(count($this->transactions) > 0)

            <div class="transaction_info flex">

                <div>

                    <p class="hel_bold transaction_info_title">{{__('texts.here_is_the_transaction_to_add')}}</p>

                    <dl class="flex transaction_info_texts_container hel_reg">

                        <div class="flex transaction_info_texts_container_text">
                            <dt>{{__('texts.date')}}&nbsp;:&nbsp;</dt>
                            <dd>{{$this->transactions[$transactionCounter][0]}}</dd>
                        </div>

                        <div class="flex transaction_info_texts_container_text">
                            <dt>{{__('texts.amount_table')}}&nbsp;:&nbsp;</dt>
                            <dd>{{$this->transactions[$transactionCounter][2]}}&euro;</dd>
                        </div>

                        <div class="flex transaction_info_texts_container_text">
                            <dt>{{__('texts.note')}}&nbsp;:&nbsp;</dt>
                            <dd>{{$this->transactions[$transactionCounter][8]}}</dd>
                        </div>

                    </dl>

                </div>

                <form wire:submit="save" class="modal_section_content_form flex">

                    <x-layout.input-label-container id="fund" class="modal_section_content_form_input_label_container"
                                                    :label="__('texts.funds_form')">

                        <select class="input" id="fund" wire:model.blur="form.fund_id" required>

                            <option class="option">{{__('texts.choose_a_fund')}}</option>

                            @foreach($funds as $fund)

                                <option class="option" value="{{$fund->id}}">{{$fund->name}}</option>

                            @endforeach

                        </select>

                        @error('form.fund_id')
                        <x-input-error :messages="$errors->get('form.fund_id')"/>
                        @enderror

                    </x-layout.input-label-container>

                    <input type="hidden" wire:model.blur="form.amount">
                    <input type="hidden" wire:model.blur="form.date">
                    <input type="hidden" wire:model.blur="form.note">
                    <input type="hidden" wire:model.blur="form.hash">

                    <x-form.submit-button :text="__('texts.add')"
                                          div_class="modal_section_content_form_submit_btn_container"
                                          btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

                </form>

            </div>

        @endif

    </div>

</section>

