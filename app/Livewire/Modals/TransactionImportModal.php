<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\TransactionForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class TransactionImportModal extends Component
{
    use WithFileUploads;
    public $isOpen = false;
    public TransactionForm $form;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

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
        $this->form->manageCSV();
        $this->dispatch('closeModal');
        $this->dispatch('openLinkATransactionToAFund');
    }
}
