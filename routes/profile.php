<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Profile\ProfileEdit;

Route::middleware('auth')->group(function () {
    Route::get('/profil', ProfileEdit::class)->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
