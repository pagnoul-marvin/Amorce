<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Livewire\Home\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/accueil', Home::class)->middleware(['auth', 'verified'])->name('home');

Route::get('/mot-de-passe-oublie', [PasswordResetLinkController::class, 'create'])->name('forgot-password');
Route::post('/mot-de-passe-oublie', [PasswordResetLinkController::class, 'store'])->name('forgot-password-send-email');

require __DIR__.'/auth.php';
require __DIR__.'/profile.php';
require __DIR__.'/tasks.php';
require __DIR__ . '/funds_and_transactions.php';
require __DIR__ .'/administrator_space.php';
