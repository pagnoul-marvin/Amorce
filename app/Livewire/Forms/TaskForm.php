<?php

namespace App\Livewire\Forms;

use App\Enum\TaskCategories;
use App\Models\Task;
use App\Models\TaskUser;
use Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate]
    public $category;

    #[Validate]
    public $title;

    #[Validate]
    public $date;

    #[Validate]
    public $description;

    #[Validate]
    public $user_id;
    public $participants = [];

    public $task;

    public function rules(): array
    {
        return [
            'category' => 'required|in:' . implode(',', TaskCategories::values()),
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function setTask(Task $task): void
    {
        $this->task = $task;
        $this->category = $task->category;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->date = $task->date;
        $this->user_id = $task->user_id;
    }

    public function updateStatus(string $category): void
    {
        $this->task->update(['category' => $category]);
    }

    public function store(): void
    {
        $this->user_id = Auth::id();
        $this->category = TaskCategories::Todo->value;
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

    public function delete(Task $task): void
    {
        $task->delete();
    }

    public function update(): void
    {
        $this->validate();
        $this->task->update($this->all());
    }
}
