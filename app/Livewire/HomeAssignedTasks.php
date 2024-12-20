<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\TaskUser;
use Livewire\Component;

class HomeAssignedTasks extends Component
{
    public $assigned_task;

    public function mount(Task $assigned_task): void
    {
        $this->assigned_task = $assigned_task;
    }
}
