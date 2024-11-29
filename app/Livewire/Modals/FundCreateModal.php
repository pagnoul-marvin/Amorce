<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\FundForm;
use Livewire\Component;

class FundCreateModal extends Component
{
    public FundForm $form;

    public $isOpen = false;

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
        $this->form->store();
        $this->form->reset();
        $this->dispatch('closeModal');
        $this->dispatch('openSuccessMessage', 'Le fond a été créé avec succès !');
        $this->dispatch('fundOpened');
    }
}
