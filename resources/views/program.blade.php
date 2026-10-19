@extends('layouts.public')

@section('title', 'Program Kami')

@section('content')

@php
    $sections = [
        'Perawatan Sepatu' => [
            ['title' => 'Deep Cleaning',    'desc' => 'Pembersihan menyeluruh hingga ke bagian terdalam sepatu.',            'icon' => 'spons.png', 'bg' => 'clean.jfif',    'est' => '1-2 Hari', 'border' => 'border-sky-300',    'glow' => 'shadow-sky-200'],
            ['title' => 'Unyellowing',      'desc' => 'Mengembalikan warna midsole sepatu yang menguning kembali cerah.',    'icon' => 'star.png',   'bg' => 'unyellowing.jfif', 'est' => '1-3 Hari', 'border' => 'border-amber-400',  'glow' => 'shadow-amber-200'],
            ['title' => 'Repaint & Repair', 'desc' => 'Pengecatan ulang dan perbaikan bagian sepatu yang rusak.',            'icon' => 'repair.png',  'bg' => 'repair.jfif',      'est' => '2-5 Hari', 'border' => 'border-orange-300', 'glow' => 'shadow-orange-200'],
        ],
        'Laundry Pakaian' => [
            ['title' => 'Cuci Kering', 'desc' => 'Pakaian dicuci bersih lalu dikeringkan, siap dilipat dan dipakai.',  'icon' => 'clotes.png', 'bg' => 'wash.jfif', 'est' => '1-2 Hari', 'border' => 'border-sky-300',   'glow' => 'shadow-sky-200'],
            ['title' => 'Setrika',     'desc' => 'Pakaian disetrika rapi dan wangi, tanpa perlu repot di rumah.',     'icon' => 'iron.png',  'bg' => 'iron.jfif', 'est' => '1 Hari',   'border' => 'border-amber-400', 'glow' => 'shadow-amber-200'],
        ],
    ];
@endphp

<div class="text-center">
    <h1 class="text-4xl font-bold">Layanan & Program</h1>
    <p class="mx-auto mt-3 max-w-2xl text-neutral-500">
        Pilih perawatan yang sesuai dengan kebutuhan pakaian dan sepatumu.
    </p>
</div>

@foreach ($sections as $sectionTitle => $programs)
    <section class="mt-14">
        <h2 class="mb-10 border-l-4 border-brand-600 pl-3 text-2xl font-bold">{{ $sectionTitle }}</h2>

        <div class="grid gap-x-6 gap-y-14 md:grid-cols-{{ count($programs) === 2 ? '2' : '3' }}">
            @foreach ($programs as $p)
                <div class="group relative rounded-2xl border-2 {{ $p['border'] }} bg-neutral-700 bg-cover bg-center shadow-xl {{ $p['glow'] }}"
                     style="background-image: url('{{ asset('images/program/' . $p['bg']) }}')">

                    {{-- ikon 3D mengambang --}}
                    <img src="{{ asset('images/icons/' . $p['icon']) }}" alt=""
                         class="float-icon group-hover:-translate-y-2 group-hover:scale-105">

<div class="relative z-10 rounded-2xl bg-gradient-to-t from-black/75 via-black/50 to-black/35 p-6 pt-24 text-white backdrop-blur-md">                        <h3 class="text-xl font-bold">{{ $p['title'] }}</h3>
                        <p class="mt-2 text-sm text-white/90">{{ $p['desc'] }}</p>

                        <div class="mt-5 flex items-center justify-between">
                            <a href="{{ route('contact') }}"
                               class="rounded-full border border-white/80 px-4 py-1.5 text-sm font-medium transition hover:bg-white hover:text-neutral-900">
                                Mulai Pesan
                            </a>
                            <span class="text-xs text-white/80">Estimasi: {{ $p['est'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endforeach

@endsection