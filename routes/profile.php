<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Profile\ProfileEdit;
use App\Livewire\Profile\ProfileShow;

Route::middleware('auth')->group(function () {
    Route::get('/profil', ProfileEdit::class)->name('profile.edit');
    Route::get('/profil/{user}', ProfileShow::class)->name('profile.show');
});
