<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Component;

class TaskCompleted extends Component
{
    public TaskForm $form;
    public Task $task;

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->form->setTask($task);
    }

    public function save(): void
    {
        $this->form->update();
        $this->dispatch('refreshTasks');
        $this->dispatch('openSuccessMessage', 'La tâche '. $this->task->title .' a été achevée avec succès !');
    }

    public function render()
    {
        return view('livewire.task-completed');
    }
}
