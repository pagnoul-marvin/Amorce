<?php

use App\Livewire\TaskShow;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/tasks/{task}', TaskShow::class)->name('tasks.show');
});
