<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\DonationForm;
use App\Models\Fund;
use Livewire\Component;

class LinkATransactionToAFundModal extends Component
{
    public $funds;
    public DonationForm $form;
    public $transactionsNeedToBeLinked;
    public $isOpen = false;

    protected $listeners = ['openModal' => 'openModal', 'openLinkATransactionToAFund' => 'openModal', 'closeModal' => 'closeModal'];

    public function mount(): void
    {
        $this->funds = Fund::all();
        $this->transactionsNeedToBeLinked = session('transactionsNeedToBeLinked');
    }

    public function openModal(): void
    {
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    public function save()
    {

    }
}
