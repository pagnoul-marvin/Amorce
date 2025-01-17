<?php

namespace App\Livewire\Messages;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Component;

class TaskArchivedConfirmationMessage extends Component
{
    public $isOpen = false;
    public TaskForm $form;
    public $task;
    protected $listeners = ['openModal' => 'openModal', 'closeModal' => 'closeModal'];

    public function openModal($id): void
    {
        $this->isOpen = true;
        $this->task = Task::find($id);
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    public function save(): void
    {
        $this->form->delete($this->task);
        $this->dispatch('closeModal');
        $this->dispatch('taskDeleted');
        $this->dispatch('openSuccessMessage', 'La ' . $this->task->title . ' a été supprimée avec succès !');
    }
}
