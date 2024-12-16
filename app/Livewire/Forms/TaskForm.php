<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use App\Models\TaskUser;
use Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate]
    public $completed;

    #[Validate]
    public $title;

    #[Validate]
    public $date;

    #[Validate]
    public $description;
    public $user_id;
    public $participants = [];

    public $task;

    public function rules(): array
    {
        return [
            'completed' => 'required|boolean',
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
        ];
    }

    public function setTask(Task $task): void
    {
        $this->task = $task;
        $this->completed = $task->completed;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->date = $task->date;
    }

    public function update(): void
    {
        $this->validate();
        $this->task->update(['completed' => $this->completed]);
    }

    public function store(): void
    {
        $this->user_id = Auth::id();
        $this->completed = false;
        if (empty($this->date)) {
            $this->date = now();
        }

        $this->validate();
        $task = Task::create($this->all());

        if (!empty($this->participants)) {
            foreach ($this->participants as $participant) {
                TaskUser::create(['task_id' => $task->id, 'user_id' => $participant]);
            }
        }
    }
}
