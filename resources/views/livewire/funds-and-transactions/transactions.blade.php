<section class="section donations_section flex" x-data="{order : @entangle('orderDirection')}">

    <div class="section_title_and_button flex">

        <h2 class="section_title hel_bold">{{__('texts.transactions')}}</h2>

        <livewire:buttons.modal-button type="add" :title="__('texts.add_transactions')" to="modals.add-or-import-transaction-modal" event="toggleVisibility"/>

        <livewire:modals.add-or-import-transaction-modal/>

    </div>

    <table class="table">

        <thead class="table_head">

        <tr>
            <th class="hel_reg_underline table_head_item" wire:click="switchOrderOfDate">{{__('texts.date')}}
                <svg :class="order == 'desc' ? '' : 'table_icon_invisible'" width="22" height="18" viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <style>
                            .table_icon {
                                fill: var(--white_color_switchable);
                            }
                        </style>
                    </defs>
                    <path class="table_icon" d="M11 18L21.3923 0L0.607696 0L11 18Z"/>
                </svg>
                <svg :class="order == 'desc' ? 'table_icon_invisible' : ''" width="22" height="18" viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
                    <path class="table_icon" d="M11 0L0.607697 18H21.3923L11 0Z"/>
                </svg>
            </th>
            <th class="hel_reg_underline table_head_item">{{__('texts.fund_table')}}</th>
            <th class="hel_reg_underline table_head_item">{{__('texts.note')}}</th>
            <th class="hel_reg_underline table_head_item">{{__('texts.amount_table')}}</th>
        </tr>

        </thead>

        <tbody class="table_body">

        @foreach($this->transactions as $transaction)

            <tr class="hel_reg table_body_item" wire:key="{{$transaction->id}}">

                <td class="hel_reg table_body_item_text">
                    <time datetime="{{$transaction->date->toDateString()}}">{{$transaction->date->format('d F Y')}}</time>
                </td>
                <td class="hel_reg table_body_item_text">{{$transaction->fund->name}}</td>
                <td title="{{$transaction->note}}" class="hel_reg table_body_item_longtext">
                    <p class="hel_reg table_body_item_longtext_text">{{$transaction->note}}</p>
                </td>
                <td class="hel_reg table_body_item_text">{{number_format($transaction->amount/100, 2, ',', ' ')}}&euro;</td>

            </tr>

        @endforeach

        </tbody>

    </table>

    {{ $this->transactions->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</section>

