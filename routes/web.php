<?php

use App\Http\Controllers\UserController;
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

// Dashboard Admin
Route::get('/admin/dashboard', [OrderController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');
    
Route::patch('/admin/pesanan/{order}/status', [OrderController::class, 'updateStatus'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.order.status');

Route::delete('/admin/pesanan/{order}', [OrderController::class, 'destroy'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.order.destroy');

Route::get('/admin/pelanggan', [UserController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.customers');

Route::delete('/admin/pelanggan/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.customers.destroy');

// Form pesan laundry (hanya pelanggan yang sudah login)
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/pesan', [OrderController::class, 'create'])->name('order.create');
    Route::post('/pesan', [OrderController::class, 'store'])->name('order.store');
    Route::get('/pesanan-saya', [OrderController::class, 'myOrders'])->name('order.mine');
    Route::get('/pesanan/{order}/edit', [OrderController::class, 'edit'])->name('order.edit');
    Route::put('/pesanan/{order}', [OrderController::class, 'update'])->name('order.update');
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