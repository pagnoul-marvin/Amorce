<div>

    <x-page-title-and-description :title="__('texts.the')" :description="__('texts.create_and_exchange_between_funds')"
                                  :bold_part="__('texts.funds_and_transactions')"/>

    <livewire:funds wire:key="funds-and-transactions-funds-section"/>

    <livewire:transactions wire:key="funds-and-transactions-transactions-section"/>

    <livewire:modals.fund-create-modal wire:key="funds-and-transactions-create-fund-modal"/>

    <livewire:modals.fund-exchange-modal wire:key="funds-and-transactions-exchange-fund-modal"/>

    <livewire:modals.transaction-create-modal wire:key="funds-and-transactions-add-donation-modal"/>

    <livewire:modals.transaction-import-modal wire:key="funds-and-transactions-import-donation-modal"/>

    <!-- TODO ajouter la modal pour lier une transaction du CSV à un fond -->

    <livewire:success-message wire:key="funds-transactions-success-message"/>

</div>
