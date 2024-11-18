<?php

use App\Http\Controllers\FundAndDonationController;

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/fonds-et-dons', [FundAndDonationController::class, 'index'])->name('funds_and_donations.index');
    Route::get('/fonds-et-dons/{fund}', [FundAndDonationController::class, 'show'])->name('funds_and_donations.show');
});

