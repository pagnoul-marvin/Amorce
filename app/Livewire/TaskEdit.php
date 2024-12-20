<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Component;

class TaskEdit extends Component
{
    public $task;
    public TaskForm $form;
    public $assigned_users = [];
    protected $listeners = ['mount' => 'mount'];

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->form->setTask($task);
        $this->form->date = $this->form->date->format('Y-m-d');
        $this->assigned_users = $task->users;
    }

    public function updateTask(): void
    {
        $this->form->update();
        $this->dispatch('mount', $this->task);
        $this->dispatch('openSuccessMessage', 'La tâche '. $this->task->title .' a été mise à jour avec succès !');
    }
}
