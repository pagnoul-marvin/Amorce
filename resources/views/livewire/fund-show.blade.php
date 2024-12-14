<div>

    <x-page-title-and-description :title="__('texts.the_fund')" :description="__('texts.see_and_modify_the_fund')"
                                  :bold_part="$fund->name"/>


    <livewire:navigations.go-back-nav :text="__('texts.go_back')" :href="route('funds_and_transactions.index')"/>

    <livewire:fund-edit :$fund wire:key="fund-show-fund-section"/>

    <livewire:fund-transactions :$fund wire:key="fund-show-transactions-section"/>

    <livewire:messages.success-message wire:key="fund-show-success-message"/>

    <livewire:messages.transaction-delete-confirmation-message wire:key="transaction-delete-success-message"/>

</div>
