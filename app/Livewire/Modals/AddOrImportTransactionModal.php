<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class AddOrImportTransactionModal extends Component
{
    public bool $isOpen = false;
    protected $listeners = ['toggleVisibility' => 'toggleVisibility'];

    public function toggleVisibility(): void
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.modals.add-or-import-transaction-modal');
    }
}
