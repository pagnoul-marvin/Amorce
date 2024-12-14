<?php

namespace App\Livewire\Messages;

use App\Livewire\Forms\TransactionForm;
use App\Models\Transaction;
use Livewire\Component;

class TransactionDeleteConfirmationMessage extends Component
{
    public $isOpen = false;
    public TransactionForm $form;
    public $transaction;
    public $fund;
    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal($id): void
    {
        $this->isOpen = true;
        $this->transaction = Transaction::find($id);
        $this->fund = $this->transaction->fund;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    public function save(): void
    {
        $this->form->delete($this->transaction);
        $this->dispatch('closeModal');
        $this->dispatch('openSuccessMessage', 'La transaction a bien été supprimée !');
        $this->dispatch('transactions');
        $this->dispatch('mount', $this->fund);
    }
}
