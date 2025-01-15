<?php

use App\Livewire\Todolist\TaskIndex;
use App\Livewire\Todolist\TaskShow;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/tasks/{task}', TaskShow::class)->name('tasks.show');
    Route::get('/todolist', TaskIndex::class)->name('tasks.index');
});
