<?php

namespace App\Livewire\Todolist;

use App\Enum\TaskCategories;
use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Component;

class OwnerToDoTasksOfTheDayListItem extends Component
{
    public Task $task;
    public $assignedUsers;

    public TaskForm $form;

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->assignedUsers = $task->users;
        $this->form->setTask($task);
    }

    public function save(): void
    {
        $this->form->updateStatus(TaskCategories::InProgress->value);
        $this->dispatch('refreshTasks');
        $this->dispatch('openSuccessMessage', 'La tâche a bien été déplacée dans les tâches en cours');
    }
}
