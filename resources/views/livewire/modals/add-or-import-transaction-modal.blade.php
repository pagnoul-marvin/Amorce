<div class="add_donations_manually_or_import" x-data="{open: @entangle('isOpen')}" x-show="open"
     x-transition:enter="modal-transition"
     x-transition:enter-start="modal-enter"
     x-transition:enter-end="modal-enter-active"
     x-transition:leave="modal-transition"
     x-transition:leave-start="modal-leave"
     x-transition:leave-end="modal-leave-active">

    <ul class="flex add_donations_manually_or_import_list">
        <li class="add_donations_manually_or_import_list_item"><p
                wire:click="dispatchTo('modals.transaction-create-modal', 'openModal')"
                class="hel_bold add_donations_manually_or_import_list_item_text">{{__('texts.add_transaction_manually')}}</p>
        </li>
        @if(Auth::user()->role === \App\Enum\UserRoles::Admin->value || Auth::user()->role === \App\Enum\UserRoles::Comptable->value)
            <li class="add_donations_manually_or_import_list_item"><p
                    wire:click="dispatchTo('modals.transaction-import-modal', 'openModal')"
                    class="hel_bold add_donations_manually_or_import_list_item_text">{{__('texts.import')}}</p></li>
        @endif
    </ul>
</div>
