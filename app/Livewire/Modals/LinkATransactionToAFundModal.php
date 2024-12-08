<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\TransactionForm;
use App\Models\Fund;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LinkATransactionToAFundModal extends Component
{
    public $funds;
    public TransactionForm $form;
    public $transactionCounter = 0;
    public $isOpen = false;

    protected $listeners = ['openModal' => 'openModal', 'openLinkATransactionToAFund' => 'openModal', 'closeModal' => 'closeModal'];

    public function mount(): void
    {
        $this->funds = Fund::all();
    }

    #[Computed]
    public function transactions()
    {
        return session('transactionsNeedToBeLinked', []);
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
