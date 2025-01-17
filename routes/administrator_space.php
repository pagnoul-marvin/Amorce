<?php


use App\Livewire\AdministratorSpace\AdministratorSpaceIndex;

Route::group(['middleware' => ['auth', 'verified',]], function () {
    Route::get('/espace-administrateur', AdministratorSpaceIndex::class)->name('espace-administrateur.index');
});

