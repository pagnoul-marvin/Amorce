<section class="section fund_transactions_section flex">

    <h2 class="section_title hel_bold">{{__('texts.transactions_linked_to')}} {{$fund->name}}</h2>

    <table class="table">

        <thead class="table_head">

            <tr>
                <th class="hel_reg_underline table_head_item" wire:click="switchOrderOfDate">{{__('texts.date')}}</th>
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

                    <form wire:submit="save({{$transaction->id}})" wire:key="delete-form-{{$transaction->id}}">

                        <x-form.submit-button :text="__('texts.delete')" div_class=""
                                              btn_class="submit_btn button"/>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    {{ $this->transactions->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</section>

