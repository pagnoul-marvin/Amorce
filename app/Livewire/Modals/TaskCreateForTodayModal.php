<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\TaskForm;
use App\Models\User;
use Auth;
use Livewire\Component;

class TaskCreateForTodayModal extends Component
{
    public $isOpen = false;
    public TaskForm $form;
    public $users;
    public $search;
    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function mount(): void
    {
        $this->updateUsers();
    }

    public function updatedSearch(): void
    {
        $this->updateUsers();
    }

    public function updateUsers(): void
    {
        $this->users = User::query()
            ->where('id', '!=', Auth::id())
            ->where(function ($query) {
                $query->where('firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%');
            })
            ->get();
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
