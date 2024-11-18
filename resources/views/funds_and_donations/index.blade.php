<x-layout.main>

    <x-page-title-and-description title="Les" :description="__('texts.create_and_exchange_between_funds')" bold_part="comptes et les dons"/>

    <section class="section flex funds_section">

        <h2 class="section_title hel_bold">{{__('texts.funds')}}</h2>

        <div class="funds_section_lists_container flex">

            <div class="list_title_and_button_container">

                <div>

                    <h3>En cours</h3>

                    <div class="button_container">

                        <livewire:buttons.modal-button button_or_link="link" type="add" title="Ajouter un fond" href="#"/>
                        <livewire:buttons.modal-button button_or_link="link" type="add" title="Ajouter un fond" href="#"/>

                    </div>

                </div>

                <ul class="funds_section_lists_container_in_process_list flex">

                    @foreach($in_process_funds as $fund)

                        <li class="funds_section_lists_container_in_process_list_item flex">

                            <p class="funds_section_lists_container_in_process_list_item_amount_text hel_reg_it">{{$fund->amount}}&euro;</p>

                            <a class="funds_section_lists_container_in_process_list_item_link hel_reg" href="" title="{{__('texts.see_details')}} {{$fund->name}}">{{$fund->name}} &ndash; {{$fund->pourcentage}}%</a>

                        </li>

                    @endforeach

                </ul>

            </div>

            <ul class="funds_section_lists_container_enclosed_list flex">

                @foreach($enclosed_funds as $fund)

                    <li class="funds_section_lists_container_enclosed_list_item flex">

                        <p class="funds_section_lists_container_enclosed_list_item_amount_text hel_reg_it">{{$fund->amount}}&euro;</p>

                        <a class="funds_section_lists_container_enclosed_list_item_link hel_reg" href="" title="{{__('texts.see_details')}} {{$fund->name}}">{{$fund->name}} &ndash; {{$fund->pourcentage}}%</a>

                    </li>

                @endforeach

            </ul>

        </div>

    </section>

</x-layout.main>
