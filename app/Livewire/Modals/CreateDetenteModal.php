<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\DetenteForm;
use Livewire\Component;

class CreateDetenteModal extends Component
{
    public DetenteForm $form;

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
        $this->dispatch('openSuccessMessage', 'La détente a été créée avec succès !');
    }
}
