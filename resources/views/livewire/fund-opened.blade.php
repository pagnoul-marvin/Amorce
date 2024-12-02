<li class="funds_section_lists_container_in_process_list_item flex">

    <div class="funds_section_lists_container_in_process_list_item_name_and_amount_container">

        <p class="funds_section_lists_container_in_process_list_item_amount_text hel_reg_it">
            {{$fund->amount}}&euro;</p>

        <a class="funds_section_lists_container_in_process_list_item_link hel_reg" wire:navigate
           href="{{route('funds_and_donations.show', $fund)}}"
           title="{{__('texts.see_details')}} {{$fund->name}}">{{$fund->name}} &ndash; {{$fund->pourcentage}}
            %</a>

    </div>

    @if($fund->id !== 1 && $fund->id !== 2)
        <form wire:submit="save">
            <input type="hidden" wire:model.blur="form.enclosed">
            <x-buttons.submit-button type="delete" :title="__('texts.make_this_fund_enclosed')"/>
        </form>
    @endif

</li>
