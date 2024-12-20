<div class="list_title_and_button_container flex">

    <div class="button_title_container flex">

        <h3 class="hel_reg button_title_container_title">{{__('texts.in_process')}}</h3>

        <div class="button_title_container_button_container flex">

            <livewire:buttons.modal-button type="exchange" :title="__('texts.perform_exchange')"
                                           to="modals.fund-exchange-modal" event="openModal"
                                           wire:key="exchange-btw-fund-btn"/>
            <livewire:buttons.modal-button type="add" :title="__('texts.create_fund')"
                                           to="modals.fund-create-modal" event="openModal"
                                           wire:key="create-fund-btn"/>

        </div>

    </div>

    <div>
        <ul class="funds_section_lists_container_in_process_list flex">

            @foreach($this->fundOpened() as $fund)

                <livewire:fund-opened :$fund wire:key="fund-opened-{{$fund->id}}"/>

            @endforeach

        </ul>
    </div>

    {{ $this->fundOpened()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</div>
