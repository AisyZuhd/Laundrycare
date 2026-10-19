<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Daftar layanan per kategori.
     */
    private const LAYANAN = [
        'Laundry Pakaian' => ['Cuci Kiloan', 'Cuci + Setrika', 'Setrika Saja'],
        'Cuci Sepatu' => ['Cuci Biasa', 'Deep Clean'],
    ];

    /**
     * Tampilkan form pesan.
     */
    public function create(): View
    {
        return view('order-form', ['daftarLayanan' => self::LAYANAN]);
    }

    /**
     * Simpan pesanan baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'kategori' => ['required', 'in:'.implode(',', array_keys(self::LAYANAN))],
            'layanan' => ['required', 'string', 'max:100'],
            'jumlah' => ['required', 'integer', 'min:1', 'max:100'],
            'no_telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string', 'max:500'],
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        // Pastikan layanan memang termasuk dalam kategori yang dipilih
        if (! in_array($data['layanan'], self::LAYANAN[$data['kategori']], true)) {
            return back()
                ->withErrors(['layanan' => 'Layanan tidak sesuai dengan kategori.'])
                ->withInput();
        }

        // user_id diambil dari akun yang login, status otomatis "menunggu"
        $request->user()->orders()->create($data);

               return redirect()
            ->route('home')
            ->with('status', 'Pesanan berhasil dikirim! Kami akan segera menghubungi kamu.');
    }

    /**
     * Dashboard admin: daftar semua pesanan.
     */
    public function index(): View
    {
        $orders = Order::with('user')->latest()->get();

        return view('admin-dashboard', ['orders' => $orders]);
    }
    /**
     * Admin mengubah status pesanan.
     */
    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:diterima,diproses,selesai'],
        ]);

        $order->update($data);

        return back()->with('status', "Status pesanan #{$order->id} diubah menjadi {$data['status']}.");
    }
    
    /**
     * Pelanggan melihat pesanannya sendiri.
     */
    public function myOrders(Request $request): View
    {
        $orders = $request->user()->orders()->latest()->get();

        return view('my-orders', ['orders' => $orders]);
    }
}