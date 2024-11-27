<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\TaskForm;
use App\Models\User;
use Livewire\Component;

class TaskCreateForTodayModal extends Component
{
    public $isOpen = false;
    public TaskForm $form;
    public $users;
    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function mount(): void
    {
        $this->users = User::all();
    }
    public function openModal(): void
    {
        $this->isOpen = true;
    }
    public function closeModal(): void
    {
        $this->isOpen = false;
    }
}
