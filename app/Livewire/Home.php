<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;

class Home extends Component
{
    public $tasks;

    protected $listeners = ['taskCompleted' => 'taskCompleted'];

    public function mount(): void
    {
        $this->tasks = Auth::user()?->getTasksForToday();
    }

    public function taskCompleted(): void
    {
        $this->tasks = Auth::user()?->getTasksForToday();
    }
}
