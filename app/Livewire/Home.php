<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class Home extends Component
{
    public $tasks;
    public $assigned_tasks;

    protected $listeners = ['refreshTasks' => 'refreshTasks'];

    public function mount(): void
    {
        $this->tasks = Auth::user()?->getTasksForToday();
        $this->assigned_tasks = Auth::user()?->getAssignedTasks()->get();
    }

    public function refreshTasks(): void
    {
        $this->tasks = Auth::user()?->getTasksForToday();
    }
}
