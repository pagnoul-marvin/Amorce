<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskUsersForm;
use App\Models\Task;
use App\Models\TaskUser;
use App\Models\User;
use Livewire\Component;

class TaskUserDelete extends Component
{
    public $task;
    public TaskUsersForm $form;
    public $assigned_users = [];
    protected $listeners = ['mount' => 'mount'];

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->assigned_users = $task->users;
    }

    public function deleteTaskUsers($task_id ,$user_id): void
    {
        $user = User::find($user_id);
        $this->form->delete($task_id, $user_id);
        $this->dispatch('mount', $this->task);
        $this->dispatch('openSuccessMessage', $user->firstname . ' a été retiré avec succès !');
    }
}
