<?php

namespace App\Livewire\Home;

use Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class TasksForToday extends Component
{
    use WithPagination;

    protected $listeners = ['refreshTasks' => 'tasks'];
    public bool $isTaskForTodayOpen = true;

    #[Computed]
    public function tasks()
    {
        return Auth::user()->getTasksForTheDay()->orderBy('title')->paginate(5);
    }

    public function openTaskForToday(): void
    {
        $this->isTaskForTodayOpen = !$this->isTaskForTodayOpen;
    }
}
