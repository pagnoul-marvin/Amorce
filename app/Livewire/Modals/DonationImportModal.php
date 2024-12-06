<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\DonationForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class DonationImportModal extends Component
{
    use WithFileUploads;
    public $isOpen = false;
    public DonationForm $form;

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
