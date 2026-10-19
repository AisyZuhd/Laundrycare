@extends('layouts.public')

@section('title', 'Contact Us')

@section('content')

<div class="text-center">
    <h1 class="text-4xl font-bold">Hubungi Kami</h1>
    <p class="mt-3 text-neutral-500">Ada pertanyaan? Tulis pesanmu di bawah ini.</p>
</div>

<form class="card mx-auto mt-10 max-w-lg space-y-5">
    <div>
        <label class="mb-1 block text-sm font-medium">Nama</label>
        <input type="text" placeholder="Masukkan nama Anda"
               class="w-full rounded-lg border border-neutral-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium">Email</label>
        <input type="email" placeholder="nama@email.com"
               class="w-full rounded-lg border border-neutral-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium">Pesan</label>
        <textarea rows="4" placeholder="Tuliskan pesan Anda"
                  class="w-full rounded-lg border border-neutral-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
    </div>

    <button type="button" class="btn-primary w-full">Kirim Pesan</button>
</form>

@endsection