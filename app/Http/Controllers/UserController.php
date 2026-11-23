<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Admin melihat daftar pelanggan.
     */
    public function index(): View
    {
        $customers = User::where('role', 'customer')
            ->withCount('orders')
            ->latest()
            ->get();

        return view('customers', ['customers' => $customers]);
    }

    /**
     * Admin menghapus pelanggan (soft delete).
     */
    public function destroy(User $user): RedirectResponse
    {
        // Hanya pelanggan yang boleh dihapus lewat halaman ini
        abort_if($user->role !== 'customer', 403);

        $user->delete();

        return back()->with('status', "Pelanggan {$user->name} dihapus.");
    }
}