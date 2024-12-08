<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\TransactionForm;
use App\Models\Fund;
use Livewire\Component;

class TransactionCreateModal extends Component
{
    public bool $isOpen = false;
    public TransactionForm $form;
    public $funds;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function mount(): void
    {
        $this->funds = Fund::all();
    }
    public function openModal(): void
    {
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    public function save(): void
    {
        $this->form->store();
        $this->form->reset();
        $this->dispatch('closeModal');
        $this->dispatch('transactions');
        $this->dispatch('openSuccessMessage', 'La transaction a été ajoutée avec succès !');
    }
}
