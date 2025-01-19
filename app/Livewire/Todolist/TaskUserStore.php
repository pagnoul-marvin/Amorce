<?php

namespace App\Livewire\Todolist;

use App\Livewire\Forms\TaskUsersForm;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class TaskUserStore extends Component
{
    public $task;
    public $users_able_to_be_added;

    public TaskUsersForm $form;

    public $search;

    protected $listeners = ['mount' => 'mount'];

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->getUsersAbleToBeAdded();
    }

    public function updatedSearch(): void
    {
        $this->getUsersAbleToBeAdded();
    }

    public function getUsersAbleToBeAdded(): void
    {
        $this->users_able_to_be_added = User::query()
            ->whereNotIn('id', array_merge($this->task->users->pluck('id')->toArray(), [$this->task->user->id]))
            ->where(function ($query) {
                $query->where('firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function addTaskUsers($task_id, $user_id): void
    {
        $user = User::find($user_id);
        $this->form->store($task_id, $user_id);
        $this->dispatch('mount', $this->task);
        $this->dispatch('openSuccessMessage', $user->firstname . ' a été ajouté avec succès !');
    }
}
