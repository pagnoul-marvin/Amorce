<?php

namespace App\Livewire\Home;

use App\Enum\TaskCategories;
use App\Models\Task;
use Livewire\Component;

class HomeAssignedTasks extends Component
{
    public $assigned_task;
    public string $correctCategoryName;
    public string $color;

    public function mount(Task $assigned_task): void
    {
        $this->assigned_task = $assigned_task;
    }

    public function getCorrectCategoryName(): array
    {
        if ($this->assigned_task->category === TaskCategories::Todo->value) {
            $this->correctCategoryName = __('texts.todo');
            $this->color = 'green';
        } elseif ($this->assigned_task->category === TaskCategories::InProgress->value) {
            $this->correctCategoryName = __('texts.in_process');
            $this->color = 'orange';
        }
        return [$this->correctCategoryName, $this->color];
    }
}
