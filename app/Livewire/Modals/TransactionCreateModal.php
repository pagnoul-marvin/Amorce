<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\TransactionForm;
use App\Models\Fund;
use App\Models\User;
use Livewire\Component;

class TransactionCreateModal extends Component
{
    public bool $isOpen = false;
    public TransactionForm $form;
    public $funds;
    public $users;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function mount(): void
    {
        $this->funds = Fund::all();
        $this->users = User::orderBy('firstname')->get();
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
