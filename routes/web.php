<?php

use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'welcome')->name('home');


// Group untuk halaman informasi
Route::prefix('info')->group(function () {

    // About
Route::get('/about', function () {
    return view('about');
})->name('about');

    // Program
Route::get('/program', function () {
    return view('program');
})->name('program');

    // Our Team
Route::get('/team', function () {
    return view('team');
})->name('team');

    // Contact Us
Route::get('/contact', function () {
    return view('contact');
})->name('contact');});

// Route dengan parameter
Route::get('/customer/{name}', function ($name) {
    return view('customer', [
        'name' => $name
    ]);});

// Redirect
Route::redirect('/kontak', '/info/contact');


// Route bawaan project: Dashboard
Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });


// Fallback
Route::fallback(function () {
    return view('404');
});


require __DIR__.'/settings.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/program', function () {
    return view('program');
});

Route::get('/our-team', function () {
    return view('team');
});

Route::get('/contact', function () {
    return view('contact');
});