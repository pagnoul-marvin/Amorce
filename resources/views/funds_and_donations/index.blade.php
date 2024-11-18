<x-layout.main>

    <x-page-title-and-description :title="__('texts.the')" :description="__('texts.create_and_exchange_between_funds')" :bold_part="__('texts.funds_and_donations')"/>

    <section class="section flex funds_section">

        <h2 class="section_title hel_bold">{{__('texts.funds')}}</h2>

        <div class="funds_section_lists_container flex">

            <div class="list_title_and_button_container flex">

                <div class="button_title_container flex">

                    <h3 class="hel_reg button_title_container_title">{{__('texts.in_process')}}</h3>

                    <div class="button_title_container_button_container flex">

                        <livewire:buttons.modal-button button_or_link="button" type="exchange" :title="__('texts.perform_exchange')" :href="false" :to="false" :event="false"/>
                        <livewire:buttons.modal-button button_or_link="button" type="add" :title="__('texts.create_fund')" :href="false" to="modals.add-fund-modal" event="openModal"/>

                    </div>

                </div>

                <ul class="funds_section_lists_container_in_process_list flex">

                    @foreach($in_process_funds as $fund)

                        <li class="funds_section_lists_container_in_process_list_item" draggable="true">

                            <p class="funds_section_lists_container_in_process_list_item_amount_text hel_reg_it">{{$fund->amount}}&euro;</p>

                            <a class="funds_section_lists_container_in_process_list_item_link hel_reg" href="{{route('funds_and_donations.show', $fund)}}" title="{{__('texts.see_details')}} {{$fund->name}}">{{$fund->name}} &ndash; {{$fund->pourcentage}}%</a>

                        </li>

                    @endforeach

                </ul>

            </div>

            <div class="list_title_and_button_container flex">

                <div class="button_title_container flex">

                    <h3 class="hel_reg button_title_container_title">{{__('texts.enclosed')}}</h3>

                </div>

                <ul class="funds_section_lists_container_enclosed_list flex">

                    @foreach($enclosed_funds as $fund)

                        <li class="funds_section_lists_container_enclosed_list_item" draggable="true">

                            <p class="funds_section_lists_container_enclosed_list_item_amount_text hel_reg_it">{{$fund->amount}}&euro;</p>

                            <a class="funds_section_lists_container_enclosed_list_item_link hel_reg" href="{{route('funds_and_donations.show', $fund)}}" title="{{__('texts.see_details')}} {{$fund->name}}">{{$fund->name}} &ndash; {{$fund->pourcentage}}%</a>

                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    </section>

    <livewire:modals.add-fund-modal/>

</x-layout.main>
