<?php

namespace App\Livewire\Todolist;

use Auth;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class OwnerInProcessTasksOfTheDayList extends Component
{
    use WithPagination;

    public $date;

    protected $listeners = ['updatedDate' => 'updateDate', 'refreshTasks' => 'inProcessTasksOfTheDay'];

    public function mount($date): void
    {
        $this->date = Carbon::parse($date);
    }

    public function updateDate($newDate): void
    {
        $this->date = Carbon::parse($newDate);
    }

    #[Computed]
    public function inProcessTasksOfTheDay()
    {
        return Auth::user()
            ->getInProcessTasksForTheDay($this->date)
            ->orderBy('title')
            ->paginate(5);
    }
}
