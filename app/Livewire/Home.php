<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class Home extends Component
{
    public $tasks;

    protected $listeners = ['refreshTasks' => 'refreshTasks'];

    public function mount(): void
    {
        $this->tasks = Auth::user()?->getTasksForToday();
    }

    public function refreshTasks(): void
    {
        $this->tasks = Auth::user()?->getTasksForToday();
    }
}
