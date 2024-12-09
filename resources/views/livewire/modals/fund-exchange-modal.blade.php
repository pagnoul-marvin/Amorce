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

            <livewire:icons.close to="modals.fund-exchange-modal" event="closeModal"
                                  wire:key="fund-exchange-modal-close-icon"/>

        </div>

        <form wire:submit="save" class="modal_section_content_form flex">

            <x-layout.input-label-container id="from" class="modal_section_content_form_input_label_container"
                                            :label="__('texts.from')">

                <select class="input" id="from" wire:model.blur="form.from_fund" required
                        value="{{old('form.from_fund')}}">

                    <option class="option">{{__('texts.choose_a_fund')}}</option>

                    @foreach($funds as $fund)

                        <option class="option" wire:model.blur="form.from_fund" value="{{$fund->id}}"
                                wire:key="from-{{$fund->id}}">{{$fund->name}} {{number_format($fund->transactions->sum('amount')/100, 2, ',', ' ')}}&euro;
                        </option>

                    @endforeach

                </select>

                @error('form.from_fund')
                <x-input-error :messages="$errors->get('form.from_fund')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="to" class="modal_section_content_form_input_label_container"
                                            :label="__('texts.to')">

                <select class="input" id="to" wire:model.blur="form.to_fund" required value="{{old('form.to_fund')}}">

                    <option class="option">{{__('texts.choose_a_fund')}}</option>

                    @foreach($funds as $fund)

                        <option class="option" wire:model.blur="form.to_fund" value="{{$fund->id}}" wire:key="to-{{$fund->id}}">
                            {{$fund->name}} {{number_format($fund->transactions->sum('amount')/100, 2, ',', ' ')}}&euro;
                        </option>

                    @endforeach

                </select>

                @error('form.to_fund')
                <x-input-error :messages="$errors->get('form.to_fund')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="amount" class="modal_section_content_form_input_label_container"
                                            :label="__('texts.amount')">

                <input class="input" type="number" step="any" placeholder="10" id="amount" wire:model.blur="form.amount" required
                       value="{{old('form.amount')}}">

                @error('form.amount')
                <x-input-error :messages="$errors->get('form.amount')"/>
                @enderror

            </x-layout.input-label-container>

            <x-form.submit-button :text="__('texts.exchange')"
                                  div_class="modal_section_content_form_submit_btn_container"
                                  btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

        </form>

    </div>

    <livewire:success-message wire:key="fund-exchange-modal-success-message"/>

</section>


