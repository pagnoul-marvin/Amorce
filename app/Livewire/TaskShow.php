<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Livewire\Forms\TaskUsersForm;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class TaskShow extends Component
{
    public $task;
    public TaskForm $task_form;
    public TaskUsersForm $task_users_form;

    public $assigned_users = [];
    public $owner;

    public $all_users;

    protected $listeners = ['mount' => 'mount'];

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->task_form->setTask($task);
        $this->task_users_form->setTaskUsers($task);
        $this->assigned_users = User::whereIn('id', $this->task_users_form->user_id)->get();
        $this->task_form->date = $this->task_form->date->format('Y-m-d');
        $this->owner = User::find($this->task_form->user_id);
        $this->all_users = User::whereNotIn('id', array_merge($this->task_users_form->user_id, [$this->owner->id]))->get();
    }

    public function saveTask(): void
    {
        $this->task_form->update();
        $this->dispatch('mount', $this->task);
        $this->dispatch('openSuccessMessage', 'La tâche '. $this->task->title .' a été mise à jour avec succès !');
    }

    public function deleteTaskUsers($id):void
    {
        $user = User::find($id);
        $this->task_users_form->delete($id);
        $this->dispatch('mount', $this->task);
        $this->dispatch('openSuccessMessage', $user->firstname. ' a été retiré avec succès !');
    }

    public function addTaskUsers($id):void
    {
        $user = User::find($id);
        $this->task_users_form->update($id);
        $this->dispatch('mount', $this->task);
        $this->dispatch('openSuccessMessage', $user->firstname. ' a été retiré avec succès !');
    }
}
