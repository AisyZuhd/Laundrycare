@extends('layouts.public')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')

<div class="flex flex-col items-center py-16 text-center">
    <p class="text-8xl font-extrabold text-brand-600 sm:text-9xl">404</p>
    <h1 class="mt-4 text-2xl font-bold sm:text-3xl">Halaman tidak ditemukan</h1>
    <p class="mt-3 max-w-md text-neutral-500">
        Sepertinya halaman yang kamu cari sudah pindah atau alamatnya salah.
    </p>

    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
        <a href="{{ route('home') }}" class="btn-primary">Kembali ke Home</a>
        <a href="{{ route('contact') }}"
           class="rounded-lg border border-neutral-300 px-5 py-2.5 font-medium transition hover:bg-neutral-100">
            Hubungi Kami
        </a>
    </div>
</div>

@endsection