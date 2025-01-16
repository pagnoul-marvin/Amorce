<div class="list_title_and_button_container flex" x-data="{open: @entangle('fundArchivedIsOpen')}">

    <div class="button_title_container flex">

        <h3 class="hel_reg button_title_container_title" wire:click="openArchivedFunds">{{__('texts.archived')}}

            <svg x-show="open" width="22" height="18"
                 viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>
                        .table_icon {
                            fill: var(--white_color_switchable);
                        }
                    </style>
                </defs>
                <path class="table_icon" d="M11 18L21.3923 0L0.607696 0L11 18Z"/>
            </svg>
            <svg x-show="!open" width="22" height="18"
                 viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg">
                <path class="table_icon" d="M11 0L0.607697 18H21.3923L11 0Z"/>
            </svg>

        </h3>

    </div>

    <div x-show="open">

        <ul class="funds_section_lists_container_enclosed_list flex">

            @foreach($this->fundEnclosed() as $fund)

                <livewire:funds-and-transactions.fund-archived :$fund wire:key="fund-enclosed-{{$fund->id}}"/>

            @endforeach

        </ul>

    </div>

    <div x-show="open">
        {{ $this->fundEnclosed()->links('vendor.livewire.custom', data:['scrollTo'=>false]) }}
    </div>

</div>
