<?php

use App\Livewire\FundsAndDonations;
use App\Livewire\FundShow;

Route::group(['middleware' => ['auth', 'verified',]], function () {
    Route::get('/fonds-et-dons', FundsAndDonations::class)->name('funds_and_donations.index');
    Route::get('/fonds-et-dons/{fund}', FundShow::class)->name('funds_and_donations.show');
});

