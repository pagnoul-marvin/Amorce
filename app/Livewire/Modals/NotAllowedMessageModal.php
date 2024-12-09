<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class NotAllowedMessageModal extends Component
{
    public $text;
    public $isOpen = false;
    protected $listeners = ['openNotAllowedMessageModal' => 'openNotAllowedMessageModal', 'closeModal' => 'closeNotAllowedMessageModal'];
    public function openNotAllowedMessageModal(string $text): void
    {
        $this->isOpen = true;
        $this->text = $text;
    }

    public function closeNotAllowedMessageModal(): void
    {
        $this->isOpen = false;
    }
}
