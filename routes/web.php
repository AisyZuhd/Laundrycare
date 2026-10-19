<?php

use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'home')->name('home');

// Halaman informasi
Route::prefix('info')->group(function () {
    Route::view('/about', 'about')->name('about');
    Route::view('/program', 'program')->name('program');
    Route::view('/team', 'team')->name('team');
    Route::view('/contact', 'contact')->name('contact');
});

// Route dengan parameter
Route::get('/customer/{name}', function ($name) {
    return view('customer', ['name' => $name]);
})->name('customer');

// Redirect
Route::redirect('/kontak', '/info/contact');

// Dashboard bawaan project
Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

require __DIR__.'/settings.php';

// Fallback (harus paling bawah)
Route::fallback(function () {
    return view('404');
});