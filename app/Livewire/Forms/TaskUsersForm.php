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
            'user_id' => 'required|exists:users,id',
            'task_id' => 'required|exists:tasks,id',
        ];
    }

    public function setTaskUsers(TaskUser $task_user): void
    {
        $this->task_id = $task_user->task_id;
        $this->user_id = $task_user->user_id;
    }

    public function delete($task_id ,$user_id): void
    {
        TaskUser::where('task_id', $task_id)->where('user_id', $user_id)->delete();
    }

    public function store($task_id ,$user_id): void
    {
        TaskUser::create([
            'task_id' => $task_id,
            'user_id' => $user_id,
        ]);
    }
}
