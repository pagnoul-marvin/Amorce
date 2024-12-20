<li class="funds_section_lists_container_enclosed_list_item flex">

    <div class="funds_section_lists_container_enclosed_list_item_name_and_amount_container">

        <p class="funds_section_lists_container_enclosed_list_item_amount_text hel_reg_it">
            {{number_format($fund->amount/100, 2, ',', ' ')}}&euro;</p>

        <a class="funds_section_lists_container_enclosed_list_item_link hel_reg" wire:navigate
           href="{{route('funds_and_transactions.show', $fund)}}"
           title="{{__('texts.see_details')}} {{$fund->name}}">{{$fund->name}} &ndash; {{$fund->pourcentage}}
            %</a>

    </div>

    <form wire:submit="save">

        <input type="hidden" wire:model.blur="form.enclosed">

        <x-buttons.submit-button type="checked" :title="__('texts.make_this_fund_enclosed')"/>

    </form>

</li>
