<?php

use App\Http\Controllers\TaskController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::patch('/task/{task}', [TaskController::class, 'makeTaskCompleted'])->name('tasks.completed');
});
