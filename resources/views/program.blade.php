@extends('layouts.public')

@section('title', 'Program Kami')

@section('content')

<div class="text-center">
    <h1 class="text-4xl font-bold">Layanan & Program</h1>
    <p class="mx-auto mt-3 max-w-2xl text-neutral-500">
        Pilih perawatan yang sesuai dengan kondisi sepatumu.
    </p>
</div>

<div class="mt-12 grid gap-6 md:grid-cols-3">
    <div class="card">
        <div class="flex size-12 items-center justify-center rounded-full bg-brand-50 text-2xl">🧼</div>
        <h2 class="mt-4 text-lg font-semibold">Deep Cleaning</h2>
        <p class="mt-2 text-sm text-neutral-500">Pembersihan menyeluruh hingga ke bagian terdalam sepatu.</p>
    </div>

    <div class="card">
        <div class="flex size-12 items-center justify-center rounded-full bg-brand-50 text-2xl">✨</div>
        <h2 class="mt-4 text-lg font-semibold">Unyellowing</h2>
        <p class="mt-2 text-sm text-neutral-500">Mengembalikan warna midsole sepatu yang menguning kembali cerah.</p>
    </div>

    <div class="card">
        <div class="flex size-12 items-center justify-center rounded-full bg-brand-50 text-2xl">🛠️</div>
        <h2 class="mt-4 text-lg font-semibold">Repaint & Repair</h2>
        <p class="mt-2 text-sm text-neutral-500">Pengecatan ulang dan perbaikan bagian sepatu yang rusak.</p>
    </div>
</div>

@endsection