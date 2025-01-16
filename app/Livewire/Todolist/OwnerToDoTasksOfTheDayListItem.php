<?php

namespace App\Livewire\Todolist;

use App\Models\Task;
use Livewire\Component;

class OwnerToDoTasksOfTheDayListItem extends Component
{
    public Task $task;
    public $assignedUsers;
    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->assignedUsers = $task->users;
    }
}
