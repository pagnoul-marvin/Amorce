<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\DonationForm;
use Livewire\Component;

class DonationImportModal extends Component
{
    public bool $isOpen = false;
    public DonationForm $form;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function save()
    {

    }
}
