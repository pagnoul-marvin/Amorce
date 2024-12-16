<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use App\Models\TaskUser;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskUsersForm extends Form
{

    #[Validate]
    public $user_id;

    #[Validate]
    public $task_id;


    public function rules(): array
    {
        return [
            'user_id' => 'required|array',
            'user_id.*' => 'exists:users,id',
            'task_id' => 'required|exists:tasks,id',
        ];
    }

    public function setTaskUsers(Task $task): void
    {
        $this->task_id = $task->id;
        $this->user_id = $task->users->pluck('id')->toArray();
    }

    public function delete($user): void
    {
        $this->validateOnly('task_id');
        TaskUser::where('task_id', $this->task_id)->where('user_id', $user)->delete();
    }

    public function update($user): void
    {
        $this->validateOnly('task_id');
        TaskUser::where('task_id', $this->task_id)->where('user_id', $user)->update();
    }
}
