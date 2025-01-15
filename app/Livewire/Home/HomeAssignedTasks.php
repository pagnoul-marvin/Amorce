<?php

namespace App\Livewire\Home;

use App\Models\Task;
use Livewire\Component;

class HomeAssignedTasks extends Component
{
    public $assigned_task;

    public function mount(Task $assigned_task): void
    {
        $this->assigned_task = $assigned_task;
    }
}
