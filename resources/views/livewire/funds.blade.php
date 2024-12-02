<section class="section space flex funds_section">

    <h2 class="section_title hel_bold">{{__('texts.funds')}}</h2>

    <div class="funds_section_lists_container flex">

        <div class="list_title_and_button_container flex">

            <div class="button_title_container flex">

                <h3 class="hel_reg button_title_container_title">{{__('texts.in_process')}} ({{count($opened_funds)}} items)</h3>

                <div class="button_title_container_button_container flex">

                    <livewire:buttons.modal-button type="exchange" :title="__('texts.perform_exchange')"
                                                   to="modals.fund-exchange-modal" event="openModal" wire:key="exchange-btw-fund-btn"/>
                    <livewire:buttons.modal-button type="add" :title="__('texts.create_fund')"
                                                   to="modals.fund-create-modal" event="openModal" wire:key="create-fund-btn"/>

                </div>

            </div>

            <div>
                <ul class="funds_section_lists_container_in_process_list flex">

                    @foreach($opened_funds as $fund)

                        <livewire:fund-opened :$fund wire:key="fund-opened-{{$fund->id}}"/>

                    @endforeach

                </ul>
            </div>

        </div>

        <div class="list_title_and_button_container flex">

            <div class="button_title_container flex">

                <h3 class="hel_reg button_title_container_title">{{__('texts.enclosed')}} ({{count($enclosed_funds)}} items)</h3>

            </div>

            <ul class="funds_section_lists_container_enclosed_list flex">

                @foreach($enclosed_funds as $fund)

                    <livewire:fund-enclosed :$fund wire:key="fund-enclosed-{{$fund->id}}"/>

                @endforeach

            </ul>


        </div>

    </div>

</section>
