<section class="section fund_transactions_section flex" x-data="{open : @entangle('orderDirection')}">

    <h2 class="section_title hel_bold">{{__('texts.transactions_linked_to')}} {{$fund->name}}</h2>

    <table class="table">

        <thead class="table_head">

            <tr>
                <th class="hel_reg_underline table_head_item" wire:click="switchOrderOfDate">{{__('texts.date')}}
                    <svg :class="open == 'desc' ? '' : 'table_icon_invisible'" width="22" height="18" viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <style>
                                .table_icon {
                                    fill: var(--white_color_switchable);
                                }
                            </style>
                        </defs>
                        <path class="table_icon" d="M11 18L21.3923 0L0.607696 0L11 18Z"/>
                    </svg>
                    <svg :class="open == 'desc' ? 'table_icon_invisible' : ''" width="22" height="18" viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
                        <path class="table_icon" d="M11 0L0.607697 18H21.3923L11 0Z"/>
                    </svg>
                </th>
                <th class="hel_reg_underline table_head_item">{{__('texts.fund_table')}}</th>
                <th class="hel_reg_underline table_head_item">{{__('texts.note')}}</th>
                <th class="hel_reg_underline table_head_item">{{__('texts.amount_table')}}</th>
                <th class="hel_reg_underline table_head_item"></th>
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
                <td class="hel_reg table_body_item_text">

                    <button class="modal_btn hel_bold" wire:key="delete-btn-{{$transaction->id}}" title="{{__('texts.make_this_fund_enclosed')}}" wire:click="dispatchTo('messages.transaction-delete-confirmation-message', 'openModal', [{{$transaction->id}}])">

                        {{__('texts.delete')}}

                    </button>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    {{ $this->transactions->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</section>

