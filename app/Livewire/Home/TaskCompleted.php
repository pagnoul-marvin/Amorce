<?php

namespace App\Livewire\Home;

use App\Enum\TaskCategories;
use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Component;

class TaskCompleted extends Component
{
    public TaskForm $form;
    public Task $task;
    public string $correctCategoryName;
    public string $color;

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->form->setTask($task);
        $this->form->completed = true;
    }

    public function save(): void
    {
        $this->form->updateStatus();
        $this->dispatch('refreshTasks');
        $this->dispatch('openSuccessMessage', 'La tâche ' . $this->task->title . ' a été clôturée avec succès !');
    }

    public function getCorrectCategoryName(): array
    {
        if ($this->task->category === TaskCategories::Todo->value) {
            $this->correctCategoryName = __('texts.todo');
            $this->color = 'green';
        } elseif ($this->task->category === TaskCategories::InProgress->value) {
            $this->correctCategoryName = __('texts.in_process');
            $this->color = 'orange';
        }
        return [$this->correctCategoryName, $this->color];
    }
}
