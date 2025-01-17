<?php

namespace App\Livewire\Todolist;

use Auth;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class AssignedArchivedTasksOfTheDayList extends Component
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
    public function assignedArchivedTasksForTheDay()
    {
        return Auth::user()
            ->getAssignedArchivedTasksForTheDay($this->date)
            ->orderBy('title')
            ->paginate(5);
    }
}
