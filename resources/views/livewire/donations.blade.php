<section class="section donations_section flex">

    <div class="section_title_and_button flex">

        <h2 class="section_title hel_bold">{{__('texts.donations')}}</h2>

        <livewire:buttons.modal-button type="add" :title="__('texts.add_donations')" to="modals.add-or-import-donation-modal" event="toggleVisibility"/>

        <livewire:modals.add-or-import-donation-modal/>

    </div>

    <table class="table">

        <thead class="table_head">

        <tr>
            <th class="hel_reg_underline table_head_item" wire:click="switchOrderOfDate">{{__('texts.date')}}</th>
            <th class="hel_reg_underline table_head_item">{{__('texts.fund_table')}}</th>
            <th class="hel_reg_underline table_head_item">{{__('texts.note')}}</th>
            <th class="hel_reg_underline table_head_item">{{__('texts.amount_table')}}</th>
        </tr>

        </thead>

        <tbody class="table_body">

        @foreach($this->donations as $donation)

            <tr class="hel_reg table_body_item" wire:key="{{$donation->id}}">

                <td class="hel_reg table_body_item_text">
                    <time
                        datetime="{{$donation->date->toDateString()}}">{{$donation->date->format('d F Y')}}</time>
                </td>
                <td class="hel_reg table_body_item_text">{{$donation->fund->name}}</td>
                <td title="{{$donation->note}}" class="hel_reg table_body_item_longtext">
                    <p class="hel_reg table_body_item_longtext_text">{{$donation->note}}</p>
                </td>
                <td class="hel_reg table_body_item_text">{{number_format($donation->amount/100, 2, ',', ' ')}}&euro;</td>

            </tr>

        @endforeach

        </tbody>

    </table>

    {{ $this->donations->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</section>

