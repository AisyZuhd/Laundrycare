@extends('layouts.public')

@section('title', 'Dashboard Admin')

@section('content')

@if (session('status'))
    <div class="mb-6 rounded-lg border border-green-300 bg-green-50 px-4 py-3 text-center text-sm font-medium text-green-700">
        {{ session('status') }}
    </div>
@endif

<div class="text-center">
    <h1 class="text-4xl font-bold">Dashboard Admin</h1>
    <p class="mt-3 text-neutral-500">Selamat datang, {{ auth()->user()->name }}! Berikut pesanan yang masuk.</p>
</div>

<div class="mt-10 overflow-x-auto rounded-xl border border-neutral-200 bg-white shadow-sm">
            <div class="mt-8 grid grid-cols-2 gap-4 md:grid-cols-5">
            <div class="card text-center">
                <p class="text-3xl font-bold">{{ $orders->count() }}</p>
                <p class="text-sm text-neutral-500">Total Pesanan</p>
            </div>
            @foreach (['menunggu', 'diterima', 'diproses', 'selesai'] as $status)
                <div class="card text-center">
                    <p class="text-3xl font-bold">{{ $perStatus->get($status, 0) }}</p>
                    <p class="text-sm text-neutral-500">{{ ucfirst($status) }}</p>
                </div>
            @endforeach
        </div>

        <p class="mt-4 text-center text-sm text-neutral-500">
            @foreach ($perKategori as $kategori => $jumlah)
                {{ $kategori }}: {{ $jumlah }} pesanan @if (! $loop->last) &middot; @endif
            @endforeach
        </p>
    <table class="w-full text-left text-sm">
        <thead class="bg-neutral-100 text-xs uppercase text-neutral-600">
            <tr>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Pemesan</th>
                <th class="px-4 py-3">Layanan</th>
                <th class="px-4 py-3">Jumlah</th>
                <th class="px-4 py-3">Telepon</th>
                <th class="px-4 py-3">Alamat</th>
                <th class="px-4 py-3">Catatan</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Waktu</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-200">
            @forelse ($orders as $order)
                <tr>
                    <td class="px-4 py-3">{{ $order->id }}</td>
                    <td class="px-4 py-3">{{ $order->user->name }}</td>
                    <td class="px-4 py-3">
                        {{ $order->kategori }}<br>
                        <span class="text-neutral-500">{{ $order->layanan }}</span>
                    </td>
                    <td class="px-4 py-3">
                        {{ $order->jumlah }} {{ $order->kategori === 'Cuci Sepatu' ? 'pasang' : 'kg' }}
                    </td>
                    <td class="px-4 py-3">{{ $order->no_telepon }}</td>
                    <td class="px-4 py-3">{{ $order->alamat }}</td>
                    <td class="px-4 py-3">{{ $order->catatan ?? '-' }}</td>
                    <td class="px-4 py-3">
                        <span class="rounded-full px-3 py-1 text-xs font-semibold
                            {{ $order->status === 'menunggu' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $order->status === 'diterima' ? 'bg-blue-100 text-blue-700' : '' }}
                            {{ $order->status === 'diproses' ? 'bg-purple-100 text-purple-700' : '' }}
                            {{ $order->status === 'selesai' ? 'bg-green-100 text-green-700' : '' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $order->created_at->format('d M Y H:i') }}</td>
                                        <td class="px-4 py-3">
                        @if ($order->status === 'menunggu')
                            <form method="POST" action="{{ route('admin.order.status', $order) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="diterima">
                                <button type="submit"
                                        class="rounded-lg bg-blue-600 px-3 py-1 text-xs font-semibold text-white hover:bg-blue-700">
                                    Terima
                                </button>
                            </form>
                        @elseif ($order->status === 'diterima')
                            <form method="POST" action="{{ route('admin.order.status', $order) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="diproses">
                                <button type="submit"
                                        class="rounded-lg bg-purple-600 px-3 py-1 text-xs font-semibold text-white hover:bg-purple-700">
                                    Proses
                                </button>
                            </form>
                        @elseif ($order->status === 'diproses')
                            <form method="POST" action="{{ route('admin.order.status', $order) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="selesai">
                                <button type="submit"
                                        class="rounded-lg bg-green-600 px-3 py-1 text-xs font-semibold text-white hover:bg-green-700">
                                    Selesai
                                </button>
                            </form>
                                                @else
                            <span class="text-xs text-neutral-400">-</span>
                        @endif

                        <form method="POST" action="{{ route('admin.order.destroy', $order) }}"
                              class="mt-2"
                              onsubmit="return confirm('Hapus pesanan #{{ $order->id }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="rounded-lg bg-red-500 px-3 py-1 text-xs font-semibold text-white hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="px-4 py-8 text-center text-neutral-500">Belum ada pesanan masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection