<?php

namespace App\Livewire\Todolist;

use App\Models\Task;
use Livewire\Component;

class AssignedToDoTasksOfTheDayListItem extends Component
{
    public Task $assignedTask;
    public $assignedUsers;

    public function mount(Task $assignedTask): void
    {
        $this->assignedTask = $assignedTask;
        $this->assignedUsers = $assignedTask->users;
    }
}
