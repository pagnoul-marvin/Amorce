<div>

    <x-page-title-and-description :title="__('texts.the')" :description="__('texts.create_and_exchange_between_funds')"
                                  :bold_part="__('texts.funds_and_donations')"/>

    <livewire:funds wire:key="funds-and-donations-funds-section"/>

    <livewire:donations wire:key="funds-and-donations-donations-section"/>

    <livewire:modals.fund-create-modal wire:key="funds-and-donations-create-fund-modal"/>

    <livewire:modals.fund-exchange-modal wire:key="funds-and-donations-exchange-fund-modal"/>

    <livewire:modals.donation-create-modal wire:key="funds-and-donations-add-donation-modal"/>

    <livewire:modals.donation-import-modal wire:key="funds-and-donations-import-donation-modal"/>

    <livewire:modals.link-a-transaction-to-a-fund-modal wire:key="link-a-transaction-to-a-fund-modal"/>

    <livewire:success-message wire:key="funds-donations-success-message"/>

</div>
