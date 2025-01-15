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

    protected $listeners = ['mount' => 'mount'];

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->users_able_to_be_added = User::whereNotIn('id', array_merge($task->users->pluck('id')->toArray(), [$task->user->id]))->get();
    }

    public function addTaskUsers($task_id, $user_id): void
    {
        $user = User::find($user_id);
        $this->form->store($task_id, $user_id);
        $this->dispatch('mount', $this->task);
        $this->dispatch('openSuccessMessage', $user->firstname . ' a été ajouté avec succès !');
    }
}
