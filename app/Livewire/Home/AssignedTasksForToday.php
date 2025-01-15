<?php

namespace App\Livewire\Home;

use Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AssignedTasksForToday extends Component
{
    use WithPagination;

    public bool $isAssignedTasksForTodayOpen = true;

    #[Computed]
    public function assignedTasks()
    {
        return Auth::user()->getAssignedTasksForTheDay()->orderBy('title')->paginate(5);
    }

    public function openAssignedTasksForToday(): void
    {
        $this->isAssignedTasksForTodayOpen = !$this->isAssignedTasksForTodayOpen;
    }
}
