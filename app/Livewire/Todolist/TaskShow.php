<?php

namespace App\Livewire\Todolist;

use App\Models\Task;
use Livewire\Component;

class TaskShow extends Component
{
    public $task;

    protected $listeners = ['mount' => 'mount'];
    public function mount(Task $task): void
    {
        $this->task = $task;
    }
}
