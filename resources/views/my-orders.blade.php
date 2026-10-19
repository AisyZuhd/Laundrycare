@extends('layouts.public')

@section('title', 'Pesanan Saya')

@section('content')

<div class="text-center">
    <h1 class="text-4xl font-bold">Pesanan Saya</h1>
    <p class="mt-3 text-neutral-500">Pantau status laundry kamu di sini.</p>
</div>

@php
    $langkah = ['menunggu' => 'Menunggu', 'diterima' => 'Diterima', 'diproses' => 'Diproses', 'selesai' => 'Selesai'];
    $urutan = array_keys($langkah);
@endphp

<div class="mx-auto mt-10 max-w-3xl space-y-5">
    @forelse ($orders as $order)
        @php $posisi = array_search($order->status, $urutan); @endphp

        <div class="card">
            <div class="flex flex-wrap items-start justify-between gap-2">
                <div>
                    <p class="text-lg font-semibold">{{ $order->kategori }} - {{ $order->layanan }}</p>
                    <p class="text-sm text-neutral-500">
                        {{ $order->jumlah }} {{ $order->kategori === 'Cuci Sepatu' ? 'pasang' : 'kg' }}
                        &middot; Dipesan {{ $order->created_at->format('d M Y H:i') }}
                    </p>
                </div>
                <span class="text-sm text-neutral-400">#{{ $order->id }}</span>
            </div>

            {{-- Tahapan status --}}
            <div class="mt-4 grid grid-cols-4 gap-2 text-center text-xs font-semibold">
                @foreach ($langkah as $kunci => $label)
                    <div class="rounded-lg px-2 py-2
                        {{ $loop->index <= $posisi ? 'bg-blue-600 text-white' : 'bg-neutral-100 text-neutral-400' }}">
                        {{ $label }}
                    </div>
                @endforeach
            </div>

            <p class="mt-3 text-sm text-neutral-600">
                @switch($order->status)
                    @case('menunggu') Pesananmu sudah masuk dan menunggu konfirmasi admin. @break
                    @case('diterima') Pesananmu sudah diterima. Kami segera memprosesnya. @break
                    @case('diproses') Laundry kamu sedang dikerjakan. @break
                    @case('selesai') Laundry kamu sudah selesai. Terima kasih! @break
                @endswitch
            </p>

            <p class="mt-2 text-sm text-neutral-500">Alamat: {{ $order->alamat }}</p>
        </div>
    @empty
        <div class="card text-center text-neutral-500">
            Kamu belum punya pesanan.
            <a href="{{ route('order.create') }}" class="font-semibold text-blue-600 hover:underline">Pesan sekarang</a>
        </div>
    @endforelse
</div>

@endsection