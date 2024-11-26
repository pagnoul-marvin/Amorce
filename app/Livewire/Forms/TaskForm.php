<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate]
    public $completed;

    public $task;

    public function rules(): array
    {
        return [
            'completed' => ['required', 'boolean'],
        ];
    }

    public function setTask(Task $task): void
    {
        $this->task = $task;
        $this->completed = !$task->completed;
    }

    public function update(): void
    {
        $this->validate();
        $this->task->update(['completed' => $this->completed]);
    }
}
