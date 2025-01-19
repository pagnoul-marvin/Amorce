<?php

namespace App\Livewire\Todolist;

use App\Livewire\Forms\TaskUsersForm;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class TaskUserDelete extends Component
{
    public $task;
    public TaskUsersForm $form;
    public $search;
    public $assigned_users = [];
    protected $listeners = ['mount' => 'mount'];


    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->getAssignedUsers();
    }

    public function updatedSearch(): void
    {
        $this->getAssignedUsers();
    }

    public function getAssignedUsers(): void
    {
        $this->assigned_users = $this->task->users()
            ->where(function ($query) {
                $query->where('firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function deleteTaskUsers($task_id, $user_id): void
    {
        $user = User::find($user_id);
        $this->form->delete($task_id, $user_id);
        $this->dispatch('mount', $this->task);
        $this->dispatch('openSuccessMessage', $user->firstname . ' a été retiré avec succès !');
    }
}
