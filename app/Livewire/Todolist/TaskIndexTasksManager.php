<?php

namespace App\Livewire\Todolist;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TaskIndexTasksManager extends Component
{
    use WithPagination;

    public $date;

    public bool $isToDoSectionVisible = true;

    public function mount(): void
    {
        $this->date = Carbon::today();
    }

    public function previousDay(): void
    {
        $this->date = $this->date->copy()->subDay();
        $this->dispatch('updatedDate', $this->date->toDateString());
    }

    public function nextDay(): void
    {
        $this->date = $this->date->copy()->addDay();
        $this->dispatch('updatedDate', $this->date->toDateString());
    }

    public function toggleToDoSection() {
        $this->isToDoSectionVisible = !$this->isToDoSectionVisible;
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
