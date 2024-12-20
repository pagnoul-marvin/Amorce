<?php

namespace App\Livewire;

use Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AssignedTasksForToday extends Component
{
    use WithPagination;
    #[Computed]
    public function assignedTasks()
    {
        return Auth::user()->getAssignedTasksForToday()->orderBy('title')->paginate(2);
    }
}
