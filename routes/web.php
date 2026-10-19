<?php

use App\Http\Controllers\OrderController;
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

// Redirect
Route::redirect('/kontak', '/info/contact');

// Dashboard Customer
Route::view('/customer/dashboard', 'customer-dashboard')
    ->middleware(['auth', 'role:customer'])
    ->name('customer.dashboard');

// Dashboard Admin
Route::get('/admin/dashboard', [OrderController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');
    
Route::patch('/admin/pesanan/{order}/status', [OrderController::class, 'updateStatus'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.order.status');

// Route dengan parameter (harus setelah dashboard customer)
Route::get('/customer/{name}', function ($name) {
    return view('customer', ['name' => $name]);
})->name('customer');

// Form pesan laundry (hanya pelanggan yang sudah login)
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/pesan', [OrderController::class, 'create'])->name('order.create');
    Route::post('/pesan', [OrderController::class, 'store'])->name('order.store');
    Route::get('/pesanan-saya', [OrderController::class, 'myOrders'])->name('order.mine');
});

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