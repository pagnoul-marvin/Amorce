<x-layout.main>

    <x-page-title-and-description :title="__('texts.the')" :description="__('texts.create_and_exchange_between_funds')"
                                  :bold_part="__('texts.funds_and_donations')"/>

    <section class="section space flex funds_section">

        <h2 class="section_title hel_bold">{{__('texts.funds')}}</h2>

        <div class="funds_section_lists_container flex">

            <div class="list_title_and_button_container flex">

                <div class="button_title_container flex">

                    <h3 class="hel_reg button_title_container_title">{{__('texts.in_process')}}</h3>

                    <div class="button_title_container_button_container flex">

                        <livewire:buttons.modal-button button_or_link="button" type="exchange"
                                                       :title="__('texts.perform_exchange')" :href="false"
                                                       to="modals.exchange-modal" event="openModal"/>
                        <livewire:buttons.modal-button button_or_link="button" type="add"
                                                       :title="__('texts.create_fund')" :href="false"
                                                       to="modals.add-fund-modal" event="openModal"/>

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

                                <livewire:buttons.modal-button button_or_link="button_submit" type="delete"
                                                               :title="__('texts.make_this_fund_enclosed')"
                                                               :href="false" :to="false" :event="false"/>

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

                                <livewire:buttons.modal-button button_or_link="button_submit" type="checked"
                                                               :title="__('texts.make_this_fund_opened')" :href="false"
                                                               :to="false" :event="false"/>

                            </form>

                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    </section>

    <section class="section donations_section flex">

        <div class="section_title_and_button flex">

            <h2 class="section_title hel_bold">{{__('texts.donations')}}</h2>

            <livewire:buttons.modal-button button_or_link="button" type="add"
                                           :title="__('texts.add_donations')" :href="false"
                                           :to="false" :event="false"/>

        </div>

        <table class="table">

            <thead class="table_head">

                <tr>
                    <th class="hel_reg_underline">{{__('texts.date')}}</th>
                    <th class="hel_reg_underline">{{__('texts.fund_table')}}</th>
                    <th class="hel_reg_underline">{{__('texts.communication')}}</th>
                    <th class="hel_reg_underline">{{__('texts.amount_table')}}</th>
                </tr>

            </thead>

            <tbody class="table_body">

            @foreach($donations as $donation)

                <tr class="hel_reg table_body_item">

                    <td>{{$donation->created_at}}</td>
                    <td>{{$donation->name}}</td>
                    <td class="hel_reg table_body_item_longtext">{{$donation->communication}}</td>
                    <td>{{$donation->amount}}&euro;</td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </section>

    <livewire:modals.add-fund-modal/>
    <livewire:modals.exchange-modal/>

</x-layout.main>
