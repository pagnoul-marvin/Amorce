<?php

namespace App\Livewire\Todolist;

use Auth;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AssignedInProcessTasksOfTheDayList extends Component
{
    use WithPagination;

    public $date;

    protected $listeners = ['updatedDate' => 'updateDate'];

    public function mount($date): void
    {
        $this->date = Carbon::parse($date);
    }

    public function updateDate($newDate): void
    {
        $this->date = Carbon::parse($newDate);
    }

    #[Computed]
    public function assignedInProcessTasksForTheDay()
    {
        return Auth::user()
            ->getAssignedInProcessTasksForTheDay($this->date)
            ->orderBy('title')
            ->paginate(5);
    }
}
