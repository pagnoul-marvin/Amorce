<section class="section donations_section flex">

    <div class="section_title_and_button flex">

        <h2 class="section_title hel_bold">{{__('texts.donations')}}</h2>

        <livewire:buttons.modal-button type="add" :title="__('texts.add_donations')" :to="false" :event="false"/>

    </div>

    <table class="table">

        <thead class="table_head">

        <tr>
            <th class="hel_reg_underline table_head_item">{{__('texts.date')}}</th>
            <th class="hel_reg_underline table_head_item">{{__('texts.fund_table')}}</th>
            <th class="hel_reg_underline table_head_item">{{__('texts.communication')}}</th>
            <th class="hel_reg_underline table_head_item">{{__('texts.amount_table')}}</th>
        </tr>

        </thead>

        <tbody class="table_body">

        @foreach($donations as $donation)

            <tr class="hel_reg table_body_item" wire:key="{{$donation->id}}">

                <td class="hel_reg table_body_item_text">
                    <time
                        datetime="{{$donation->created_at->toDateString()}}">{{$donation->created_at->format('d F Y')}}</time>
                </td>
                <td class="hel_reg table_body_item_text">{{$donation->name}}</td>
                <td title="{{$donation->communication}}"
                    class="hel_reg table_body_item_longtext">{{$donation->communication}}</td>
                <td class="hel_reg table_body_item_text">{{$donation->amount}}&euro;</td>

            </tr>

        @endforeach

        </tbody>

    </table>

    {{ $donations->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}

</section>

