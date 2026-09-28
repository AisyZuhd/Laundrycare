<?php

use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'welcome')->name('home');


// Group untuk halaman informasi
Route::prefix('info')->group(function () {

    // About
    Route::get('/about', function () {
        return 'Laundry Care adalah layanan laundry yang membantu pelanggan merawat pakaian dengan mudah dan praktis.';
    })->name('about');

    // Program
    Route::get('/program', function () {
        return 'Program Laundry Care: Cuci Kering, Cuci Setrika, dan Express Laundry.';
    })->name('program');

    // Our Team
    Route::get('/team', function () {
        return 'Our Team - Tim Laundry Care siap memberikan pelayanan terbaik.';
    })->name('team');

    // Contact Us
    Route::get('/contact', function () {
        return 'Contact Us - Hubungi Laundry Care melalui WhatsApp.';
    })->name('contact');
});


// Route dengan parameter
Route::get('/customer/{name}', function ($name) {
    return 'Selamat datang, ' . $name . '!';
});


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
    return 'Halaman yang kamu cari tidak ditemukan.';
});


require __DIR__.'/settings.php';
