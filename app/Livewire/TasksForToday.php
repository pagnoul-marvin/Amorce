<?php

namespace App\Livewire;

use Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class TasksForToday extends Component
{
    use WithPagination;

    protected $listeners = ['refreshTasks' => 'tasks'];
    public bool $isTaskForTodayOpen = true;
    public bool $icon_visible = true;

    #[Computed]
    public function tasks()
    {
        return Auth::user()->getTasksForToday()->orderBy('title')->paginate(2);
    }

    public function openTaskForToday(): void
    {
        $this->isTaskForTodayOpen = !$this->isTaskForTodayOpen;
        $this->icon_visible = !$this->icon_visible;
    }
}
