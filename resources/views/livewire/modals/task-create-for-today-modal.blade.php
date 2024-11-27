<section class="modal_section flex" x-data="{open: @entangle('isOpen')}" x-show="open"
         x-transition:enter="modal-transition"
         x-transition:enter-start="modal-enter"
         x-transition:enter-end="modal-enter-active"
         x-transition:leave="modal-transition"
         x-transition:leave-start="modal-leave"
         x-transition:leave-end="modal-leave-active">

    <div class="modal_section_content flex">

        <div class="modal_section_content_title_and_close_container flex">

            <h2 class="modal_section_content_title_and_close_container_title hel_bold">{{__('texts.add_a_task_for_today')}}</h2>

            <livewire:icons.close to="modals.task-create-for-today-modal" event="closeModal" wire:key="task-create-for-today-modal-close-icon"/>

        </div>

        <form wire:submit="save" class="modal_section_content_form flex">

            <x-layout.input-label-container id="title" class="modal_section_content_form_input_label_container" :label="__('texts.title')">

                <input class="input" id="title" wire:model.blur="form.title" required value="{{old('form.title')}}">

                @error('form.title')
                <x-input-error :messages="$errors->get('form.title')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="description" class="modal_section_content_form_input_label_container" :label="__('texts.description')">

                <input class="input" id="description" wire:model.blur="form.description" required value="{{old('form.description')}}">

                @error('form.description')
                <x-input-error :messages="$errors->get('form.description')"/>
                @enderror

            </x-layout.input-label-container>
            <x-layout.input-label-container id="amount" class="modal_section_content_form_input_label_container" :label="__('texts.amount')">

                <select class="input" type="number" id="amount" wire:model.blur="form.amount" required value="{{old('form.amount')}}">

                    @foreach($users as $user)

                        <option class="option">{{$user->role}} &ndash; {{$user->firstname}} {{$user->lastname}}</option>

                    @endforeach

                </select>

                @error('form.amount')
                <x-input-error :messages="$errors->get('form.amount')"/>
                @enderror

            </x-layout.input-label-container>

            <x-form.submit-button :text="__('texts.exchange')" div_class="modal_section_content_form_submit_btn_container" btn_class="modal_section_content_form_submit_btn_container_submit_btn button"/>

        </form>

    </div>

    <livewire:success-message wire:key="task-create-for-today-modal-success-message"/>

</section>



