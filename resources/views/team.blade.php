@extends('layouts.public')

@section('title', 'Our Team')

@section('content')

@php
    $members = [
        ['name' => 'Aisy', 'role' => 'Frontend Developer', 'nim' => '2410120004', 'photo' => 'aisy.png'],
        ['name' => 'Siti', 'role' => 'Backend Developer',  'nim' => '2410120001', 'photo' => 'siti.png'],
    ];
@endphp

<div class="text-center">
    <h1 class="text-4xl font-bold">Tim Kami</h1>
    <p class="mt-3 text-neutral-500">Orang-orang di balik Laundrycare.</p>
</div>

<div class="mx-auto mt-12 grid max-w-3xl gap-6 sm:grid-cols-2">
    @foreach ($members as $member)
        <div class="card text-center">
            <img src="{{ asset('images/team/' . $member['photo']) }}"
                 alt="Foto {{ $member['name'] }}"
                 class="mx-auto size-32 rounded-full border-4 border-brand-100 object-cover">
            <h2 class="mt-4 text-xl font-semibold">{{ $member['name'] }}</h2>
            <p class="text-sm font-medium text-brand-600">{{ $member['role'] }}</p>
            <p class="mt-2 text-sm text-neutral-500">NIM: {{ $member['nim'] }}</p>
        </div>
    @endforeach
</div>

@endsection