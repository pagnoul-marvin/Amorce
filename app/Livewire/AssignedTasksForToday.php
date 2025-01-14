<?php

namespace App\Livewire;

use Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AssignedTasksForToday extends Component
{
    use WithPagination;

    public bool $isAssignedTasksForTodayOpen = false;
    public bool $icon_visible = false;

    #[Computed]
    public function assignedTasks()
    {
        return Auth::user()->getAssignedTasksForToday()->orderBy('title')->paginate(2);
    }

    public function openAssignedTasksForToday(): void
    {
        $this->isAssignedTasksForTodayOpen = !$this->isAssignedTasksForTodayOpen;
        $this->icon_visible = !$this->icon_visible;
    }
}
