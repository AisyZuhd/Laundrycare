@extends('layouts.public')

@section('title', 'Home')

@section('content')

{{-- Hero --}}
<section class="rounded-3xl bg-gradient-to-br from-brand-600 to-brand-700 px-6 py-16 text-center text-white shadow-lg sm:py-24">
    <span class="inline-block rounded-full bg-white/20 px-4 py-1 text-sm font-medium">
        Perawatan sepatu profesional
    </span>
    <h1 class="mx-auto mt-6 max-w-3xl text-4xl font-bold leading-tight sm:text-5xl">
        Selamat Datang di Laundrycare
    </h1>
    <p class="mx-auto mt-4 max-w-2xl text-lg text-brand-100">
        Layanan perawatan dan perbaikan sepatu profesional. Sepatu bersih, awet, dan seperti baru lagi.
    </p>
    <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
        <a href="{{ route('program') }}"
           class="rounded-lg bg-white px-6 py-3 font-semibold text-brand-700 transition hover:bg-brand-50">
            Lihat Program
        </a>
        <a href="{{ route('contact') }}"
           class="rounded-lg border border-white/60 px-6 py-3 font-semibold text-white transition hover:bg-white/10">
            Hubungi Kami
        </a>
    </div>
</section>

{{-- Layanan --}}
<section class="mt-16">
    <div class="text-center">
        <h2 class="text-3xl font-bold">Layanan Kami</h2>
        <p class="mt-2 text-neutral-500">Semua kebutuhan sepatumu ada di sini.</p>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-3">
        @php
            $services = [
                ['icon' => '🧼', 'title' => 'Cuci Sepatu',    'desc' => 'Deep clean untuk semua jenis bahan, dari kanvas sampai kulit.'],
                ['icon' => '🛠️', 'title' => 'Perbaikan',      'desc' => 'Lem sol, jahit, dan ganti bagian yang rusak oleh teknisi berpengalaman.'],
                ['icon' => '✨', 'title' => 'Repaint & Restore', 'desc' => 'Warna pudar? Kami kembalikan tampilannya seperti baru.'],
            ];
        @endphp

        @foreach ($services as $service)
            <div class="card text-center">
                <div class="mx-auto flex size-14 items-center justify-center rounded-full bg-brand-50 text-2xl">
                    {{ $service['icon'] }}
                </div>
                <h3 class="mt-4 text-lg font-semibold">{{ $service['title'] }}</h3>
                <p class="mt-2 text-sm text-neutral-500">{{ $service['desc'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- Keunggulan --}}
<section class="mt-16 rounded-3xl bg-brand-50 px-6 py-12">
    <div class="grid gap-8 text-center md:grid-cols-3">
        <div>
            <p class="text-4xl font-bold text-brand-600">500+</p>
            <p class="mt-1 text-neutral-600">Sepatu sudah ditangani</p>
        </div>
        <div>
            <p class="text-4xl font-bold text-brand-600">2 Hari</p>
            <p class="mt-1 text-neutral-600">Estimasi pengerjaan</p>
        </div>
        <div>
            <p class="text-4xl font-bold text-brand-600">100%</p>
            <p class="mt-1 text-neutral-600">Garansi kepuasan</p>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="mt-16 text-center">
    <h2 class="text-2xl font-bold">Siap bikin sepatumu kinclong?</h2>
    <p class="mt-2 text-neutral-500">Hubungi kami sekarang dan dapatkan konsultasi gratis.</p>
    <a href="{{ route('contact') }}" class="btn-primary mt-6">Pesan Sekarang</a>
</section>

@endsection