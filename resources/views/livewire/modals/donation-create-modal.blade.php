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

            <livewire:icons.close to="modals.donation-create-modal" event="closeModal" wire:key="donation-create-modal-close-icon"/>

        </div>

        <form wire:submit="save" class="modal_section_content_form flex">

            <x-layout.input-label-container id="date" class="modal_section_content_form_input_label_container" :label="__('texts.date_form')">

                <input class="input" type="date" id="date" wire:model.blur="form.date" required value="{{old('form.date')}}">

                @error('form.date')
                <x-input-error :messages="$errors->get('form.date')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="amount" class="modal_section_content_form_input_label_container" :label="__('texts.amount')">

                <input class="input" type="number" id="amount" wire:model.blur="form.amount" required placeholder="10" value="{{old('form.amount')}}">

                @error('form.amount')
                <x-input-error :messages="$errors->get('form.amount')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="note" class="modal_section_content_form_input_label_container" :label="__('texts.note')">

                <textarea class="input" id="note" wire:model.blur="form.note" placeholder="{{__('texts.donation_location')}}" required value="{{old('form.note')}}">



                </textarea>

                @error('form.note')
                <x-input-error :messages="$errors->get('form.note')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="fund" class="modal_section_content_form_input_label_container" :label="__('texts.funds_form')">

                <select class="input" id="fund" wire:model.blur="form.fund_id" required value="{{old('form.note')}}">

                    @foreach($funds as $fund)

                        <option class="option">{{$fund->name}}</option>

                    @endforeach

                </select>

                @error('form.note')
                <x-input-error :messages="$errors->get('form.note')"/>
                @enderror

            </x-layout.input-label-container>

            <x-form.submit-button :text="__('texts.add')" div_class="modal_section_content_form_submit_btn_container" btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

        </form>

    </div>

    <livewire:success-message wire:key="donation-crate-modal-success-message"/>

</section>

