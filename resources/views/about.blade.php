@extends('layouts.public')

@section('title', 'About')
@section('body-class', 'bg-neutral-900 text-white')

@section('content')

@php
    $items = [
        ['icon' => 'target.png',    'title' => 'Visi', 'text' => 'Menjadi penyedia layanan perawatan dan pemeliharaan sepatu serta pakaian profesional yang terdepan, terpercaya, dan menjadi pilihan utama dalam menjaga kualitas serta ketahanan gaya hidup pelanggan.'],
        ['icon' => 'clipboard.png', 'title' => 'Misi', 'text' => 'Memberikan layanan pembersihan, perawatan, dan perbaikan sepatu serta pakaian dengan standar kualitas terbaik dan teliti, serta menggunakan produk pemeliharaan yang aman, berkualitas tinggi, dan ramah terhadap berbagai jenis bahan tekstil dan kulit.'],
    ];
@endphp

<div class="glass border-white/15 px-6 py-8 text-center">
    <h1 class="text-4xl font-bold">Tentang Kami</h1>
    <p class="mx-auto mt-3 max-w-2xl text-white/70">
        Laundrycare adalah layanan perawatan dan perbaikan sepatu serta pakaian profesional.
    </p>
</div>

<div class="mt-8 grid gap-6 lg:grid-cols-2">
    <div class="overflow-hidden rounded-2xl border border-white/15 bg-neutral-800 shadow-lg">
        <img src="{{ asset('images/about/laundry-flat.jfif') }}" alt="Pakaian dan sepatu"
             class="h-full min-h-64 w-full object-cover">
    </div>

    <div class="flex flex-col gap-6">
        @foreach ($items as $item)
            <div class="glass flex items-center gap-5 border-sky-300/40 p-6">
                <img src="{{ asset('images/icons/' . $item['icon']) }}" alt=""
                     class="size-20 shrink-0 object-contain drop-shadow-lg">
                <div>
                    <h2 class="text-xl font-semibold">{{ $item['title'] }}</h2>
                    <p class="mt-1 text-sm text-white/80">{{ $item['text'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection