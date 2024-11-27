<?php

use App\Http\Controllers\FundAndDonationController;
use App\Livewire\FundsAndDonations;

Route::group(['middleware' => ['auth', 'verified',]], function () {
    Route::get('/fonds-et-dons', FundsAndDonations::class)->name('funds_and_donations.index');
    Route::get('/fonds-et-dons/{fund}', [FundAndDonationController::class, 'show'])->name('funds_and_donations.show');
    Route::patch('/fonds-et-dons/{fund}', [FundAndDonationController::class, 'makeFundEnclosedOrOpened'])->name('funds_and_donations.enclosedOrOpened');
});

