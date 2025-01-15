<?php

namespace App\Livewire\Todolist;

use Auth;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class TaskIndexTasksManager extends Component
{
    use WithPagination;

    public $date;

    public function mount(): void
    {
        $this->date = Carbon::today();
    }

    #[Computed]
    public function tasksOfTheDay()
    {
        return Auth::user()
            ->getTasksForTheDay($this->date)
            ->orderBy('title')
            ->paginate(5);
    }

    public function previousDay(): void
    {
        $this->date = $this->date->copy()->subDay();
    }

    public function nextDay(): void
    {
        $this->date = $this->date->copy()->addDay();
    }

    public function getFormattedDateProperty()
    {
        if ($this->date->isToday()) {
            return __('texts.today');
        } elseif ($this->date->isTomorrow()) {
            return __('texts.tomorrow');
        } elseif ($this->date->isYesterday()) {
            return __('texts.yesterday');
        }

        return $this->date->translatedFormat('l j F Y');
    }
}
