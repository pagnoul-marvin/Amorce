<x-layout.main>

    <x-page-title-and-description :title="__('texts.the')" :description="__('texts.create_and_exchange_between_funds')"
                                  :bold_part="__('texts.funds_and_donations')"/>


    <livewire:funds/>

    <livewire:donations/>

    <livewire:modals.add-fund-modal/>

    <livewire:modals.exchange-modal/>

</x-layout.main>
