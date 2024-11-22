<section class="section space flex funds_section">

    <h2 class="section_title hel_bold">{{__('texts.funds')}}</h2>

    <div class="funds_section_lists_container flex">

        <div class="list_title_and_button_container flex">

            <div class="button_title_container flex">

                <h3 class="hel_reg button_title_container_title">{{__('texts.in_process')}}</h3>

                <div class="button_title_container_button_container flex">

                    <livewire:buttons.modal-button type="exchange" :title="__('texts.perform_exchange')" to="modals.exchange-modal" event="openModal"/>
                    <livewire:buttons.modal-button type="add" :title="__('texts.create_fund')" to="modals.add-fund-modal" event="openModal"/>

                </div>

            </div>

            <ul class="funds_section_lists_container_in_process_list flex">

                @foreach($in_process_funds as $fund)

                    <li class="funds_section_lists_container_in_process_list_item flex" draggable="true">

                        <div class="funds_section_lists_container_in_process_list_item_name_and_amount_container">

                            <p class="funds_section_lists_container_in_process_list_item_amount_text hel_reg_it">
                                {{$fund->amount}}&euro;</p>

                            <a class="funds_section_lists_container_in_process_list_item_link hel_reg"
                               href="{{route('funds_and_donations.show', $fund)}}"
                               title="{{__('texts.see_details')}} {{$fund->name}}">{{$fund->name}} &ndash; {{$fund->pourcentage}}
                                %</a>

                        </div>

                        <form action="{{route('funds_and_donations.enclosedOrOpened', $fund)}}" method="post">

                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="enclosed" required value="{{ $fund->enclosed ? 0 : 1 }}">

                            <x-buttons.submit-button type="delete" :title="__('texts.make_this_fund_enclosed')"/>

                        </form>

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

                    <li class="funds_section_lists_container_enclosed_list_item flex" draggable="true">

                        <div>

                            <p class="funds_section_lists_container_enclosed_list_item_amount_text hel_reg_it">
                                {{$fund->amount}}&euro;</p>

                            <a class="funds_section_lists_container_enclosed_list_item_link hel_reg"
                               href="{{route('funds_and_donations.show', $fund)}}"
                               title="{{__('texts.see_details')}} {{$fund->name}}">{{$fund->name}} &ndash; {{$fund->pourcentage}}
                                %</a>

                        </div>

                        <form action="{{route('funds_and_donations.enclosedOrOpened', $fund)}}" method="post">

                            @csrf
                            @method('PATCH')

                            <input type="hidden" name="enclosed" required value="{{ $fund->enclosed ? 0 : 1 }}">

                            <x-buttons.submit-button type="checked" :title="__('texts.make_this_fund_opened')"/>

                        </form>

                    </li>

                @endforeach

            </ul>

        </div>

    </div>

</section>
