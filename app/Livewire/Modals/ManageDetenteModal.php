<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\DetenteForm;
use App\Models\Detente;
use Livewire\Component;

class ManageDetenteModal extends Component
{
    public DetenteForm $form;

    public $isOpen = false;

    public $detente;

    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal($id): void
    {
        $this->isOpen = true;
        $this->detente = Detente::find($id);
        $this->form->setDetente($this->detente);
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }
}
