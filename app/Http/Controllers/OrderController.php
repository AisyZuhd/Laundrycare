<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
     * CREATE: tampilkan form pesan.
     */
    public function create(): View
    {
        return view('order-form', ['daftarLayanan' => self::LAYANAN]);
    }

    /**
     * CREATE: simpan pesanan baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        // user_id diambil dari akun yang login, status otomatis "menunggu"
        $request->user()->orders()->create($data);

        return redirect()
            ->route('home')
            ->with('status', 'Pesanan berhasil dikirim! Kami akan segera menghubungi kamu.');
    }

    /**
     * READ (admin): daftar semua pesanan beserta ringkasan.
     */
    public function index(): View
    {
        $orders = Order::with('user')->latest()->get();

        // Collection: hitung jumlah pesanan per status dan per kategori
        $perStatus = $orders->groupBy('status')->map->count();
        $perKategori = $orders->groupBy('kategori')->map->count();

        return view('admin-dashboard', [
            'orders' => $orders,
            'perStatus' => $perStatus,
            'perKategori' => $perKategori,
        ]);
    }

    /**
     * READ (pelanggan): pesanan milik sendiri.
     */
    public function myOrders(Request $request): View
    {
        $orders = $request->user()->orders()->latest()->get();

        return view('my-orders', ['orders' => $orders]);
    }

    /**
     * UPDATE: form edit pesanan (hanya saat status masih menunggu).
     */
    public function edit(Request $request, Order $order): View
    {
        $this->authorizeEdit($request, $order);

        return view('order-form', [
            'daftarLayanan' => self::LAYANAN,
            'order' => $order,
        ]);
    }

    /**
     * UPDATE: simpan perubahan data pesanan.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        $this->authorizeEdit($request, $order);

        $order->update($this->validatedData($request));

        return redirect()
            ->route('order.mine')
            ->with('status', "Pesanan #{$order->id} berhasil diperbarui.");
    }

    /**
     * UPDATE (admin): ubah status pesanan.
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
     * DELETE (admin): hapus pesanan dengan soft delete.
     */
    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return back()->with('status', "Pesanan #{$order->id} dihapus.");
    }

    /**
     * Validasi isian form pesan (dipakai oleh store dan update).
     */
    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'kategori' => ['required', 'in:'.implode(',', array_keys(self::LAYANAN))],
            'layanan' => ['required', 'string', 'max:100'],
            'jumlah' => ['required', 'integer', 'min:1', 'max:100'],
            'no_telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string', 'max:500'],
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        // Layanan harus sesuai dengan kategori yang dipilih
        if (! in_array($data['layanan'], self::LAYANAN[$data['kategori']], true)) {
            throw ValidationException::withMessages([
                'layanan' => 'Layanan tidak sesuai dengan kategori.',
            ]);
        }

        return $data;
    }

    /**
     * Pesanan hanya boleh diedit pemiliknya, selama status masih menunggu.
     */
    private function authorizeEdit(Request $request, Order $order): void
    {
        abort_if($order->user_id !== $request->user()->id, 403);
        abort_if($order->status !== 'menunggu', 403, 'Pesanan sudah diproses dan tidak bisa diedit.');
    }
}