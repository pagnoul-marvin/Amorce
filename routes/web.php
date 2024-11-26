<?php


use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', Home::class)->middleware(['auth', 'verified'])->name('home');

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

require __DIR__.'/auth.php';
require __DIR__.'/profile.php';
require __DIR__.'/tasks.php';
require __DIR__.'/funds_and_donations.php';
