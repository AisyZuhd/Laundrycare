@extends('layouts.public')

@section('title', 'Home')

@section('content')

@if (session('status'))
    <div class="mb-6 rounded-lg border border-green-300 bg-green-50 px-4 py-3 text-center text-sm font-medium text-green-700">
        {{ session('status') }}
    </div>
@endif

@php
    $categories = [
        ['icon' => 'spons.png', 'title' => 'Perawatan Sepatu', 'desc' => 'Deep clean, unyellowing, repaint dan perbaikan untuk semua jenis bahan.', 'bg' => 'bg-pink-100'],
        ['icon' => 'clotes.png',  'title' => 'Laundry Pakaian',  'desc' => 'Cuci kering dan setrika, bersih, wangi, dan rapi tanpa repot.',          'bg' => 'bg-sky-100'],
        ['icon' => 'star.png',   'title' => 'Repaint & Restore', 'desc' => 'Warna pudar? Kami kembalikan tampilannya seperti baru.',                 'bg' => 'bg-amber-100'],
    ];

    $gallery = [
        ['title' => 'Leather Jacket Restoration', 'before' => 'jaket-kotor.jfif', 'after' => 'jaket-bersih.jfif'],
        ['title' => 'Shirt De-staining',          'before' => 'baju-kotor.jfif',  'after' => 'baju-bersih.jfif'],
        ['title' => 'Suit Deep Clean',            'before' => 'jas-kotor.jfif',   'after' => 'jas-bersih.jfif'],
        ['title' => 'Sneakers Cleaning',          'before' => 'sepatu2-kotor.jfif', 'after' => 'sepatu1-bersih.jfif'],
        ['title' => 'Sneakers Unyellowing',       'before' => 'sepatu1-kotor.jfif', 'after' => 'sepatu2-bersih.jfif'],
    ];

    $stats = [
        ['value' => '500+',   'label' => 'Sepatu dan pakaian sudah ditangani'],
        ['value' => '2 Hari', 'label' => 'Estimasi pengerjaan'],
        ['value' => '100%',   'label' => 'Garansi kepuasan'],
    ];
@endphp

{{-- Hero --}}
<section class="relative overflow-hidden rounded-3xl bg-neutral-800 bg-cover bg-center shadow-xl"
         style="background-image: url('{{ asset('images/hero-bg.jfif') }}')">
    <div class="bg-black/55 px-6 py-20 text-center text-white sm:py-28">
        <span class="inline-block rounded-full bg-white/20 px-4 py-1 text-sm backdrop-blur">
            Laundry & perawatan sepatu profesional
        </span>
        <h1 class="mx-auto mt-6 max-w-3xl text-4xl font-bold leading-tight sm:text-5xl">
            Selamat Datang di Laundrycare
        </h1>
        <p class="mx-auto mt-4 max-w-2xl text-lg text-white/90">
            Layanan perawatan sepatu dan laundry pakaian. Bersih, awet, dan seperti baru lagi.
        </p>
        <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
            <a href="{{ route('program') }}"
               class="rounded-lg bg-white px-6 py-3 font-semibold text-brand-700 transition hover:bg-brand-50">
                Lihat Program
            </a>
            <a href="{{ route('contact') }}"
               class="rounded-lg bg-brand-600 px-6 py-3 font-semibold text-white transition hover:bg-brand-700">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

{{-- Layanan --}}
<section class="mt-16">
    <div class="text-center">
        <h2 class="text-3xl font-bold">Layanan Kami</h2>
        <p class="mt-2 text-neutral-500">Semua kebutuhan pakaian dan sepatumu ada di sini.</p>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-3">
        @foreach ($categories as $c)
            <div class="card text-center">
                <div class="mx-auto flex size-24 items-center justify-center rounded-full {{ $c['bg'] }}">
                    <img src="{{ asset('images/icons/' . $c['icon']) }}" alt="" class="size-16 object-contain">
                </div>
                <h3 class="mt-4 text-lg font-semibold">{{ $c['title'] }}</h3>
                <p class="mt-2 text-sm text-neutral-500">{{ $c['desc'] }}</p>
                <a href="{{ route('program') }}" class="mt-4 inline-block text-sm font-semibold text-brand-600 hover:text-brand-700">
                    Info Lebih Lanjut
                </a>
            </div>
        @endforeach
    </div>
</section>

{{-- Galeri Before / After --}}
<section class="mt-16">
    <div class="text-center">
        <h2 class="text-3xl font-bold">Hasil Kerja Kami</h2>
        <p class="mt-2 text-neutral-500">Lihat sendiri perbedaan sebelum dan sesudah.</p>
    </div>

<div class="mt-10 flex flex-wrap justify-center gap-6">
    @foreach ($gallery as $g)
        <figure class="card w-full p-3 sm:w-[calc(50%-0.75rem)] lg:w-[calc(33.333%-1rem)]">
                <div class="grid grid-cols-2 gap-2">
                    @foreach (['before' => 'Before', 'after' => 'After'] as $key => $label)
                        <div class="relative overflow-hidden rounded-lg bg-neutral-200">
                            <img src="{{ asset('images/gallery/' . $g[$key]) }}" alt="{{ $g['title'] }} {{ $label }}"
                                 class="aspect-square w-full object-cover">
                            <span class="absolute right-1 top-1 rounded bg-black/60 px-2 py-0.5 text-[10px] font-medium text-white">
                                {{ $label }}
                            </span>
                        </div>
                    @endforeach
                </div>
                <figcaption class="mt-3 text-center text-sm font-semibold">{{ $g['title'] }}</figcaption>
            </figure>
        @endforeach
    </div>
</section>

{{-- Statistik --}}
<section class="mt-16 grid gap-4 md:grid-cols-3">
    @foreach ($stats as $s)
        <div class="rounded-xl border border-brand-100 bg-brand-50 p-6 text-center">
            <p class="text-3xl font-bold text-brand-700">{{ $s['value'] }}</p>
            <p class="mt-1 text-sm text-neutral-600">{{ $s['label'] }}</p>
        </div>
    @endforeach
</section>

{{-- CTA --}}
<section class="mt-16 text-center">
    <h2 class="text-2xl font-bold">Siap bikin pakaian dan sepatumu kinclong?</h2>
    <p class="mt-2 text-neutral-500">Hubungi kami sekarang dan dapatkan konsultasi gratis.</p>
    <a href="{{ route('order.create') }}" class="btn-primary mt-6">Pesan Sekarang</a>
</section>

@endsection