<?php

use App\Livewire\FundsAndTransactions;
use App\Livewire\FundShow;

Route::group(['middleware' => ['auth', 'verified',]], function () {
    Route::get('/fonds-et-transactions', FundsAndTransactions::class)->name('funds_and_transactions.index');
    Route::get('/fonds-et-transactions/{fund}', FundShow::class)->name('funds_and_transactions.show');
});

