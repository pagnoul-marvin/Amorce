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

    #[Computed]
    public function tasks()
    {
        return Auth::user()->getTasksForToday()->orderBy('title')->paginate(2);
    }
}
