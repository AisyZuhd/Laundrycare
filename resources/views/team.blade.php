@extends('layouts.public')

@section('title', 'Our Team')

@section('content')

<div class="text-center">
    <h1 class="text-4xl font-bold">Tim Kami</h1>
    <p class="mt-3 text-neutral-500">Orang-orang di balik Laundrycare.</p>
</div>

<div class="mx-auto mt-12 grid max-w-3xl gap-6 sm:grid-cols-2">
    <div class="card text-center">
        <div class="mx-auto flex size-20 items-center justify-center rounded-full bg-brand-100 text-3xl">👩‍💻</div>
        <h2 class="mt-4 text-xl font-semibold">Aisy</h2>
        <p class="text-sm font-medium text-brand-600">Frontend Developer</p>
        <p class="mt-2 text-sm text-neutral-500">NIM: 2410120004</p>
    </div>

    <div class="card text-center">
        <div class="mx-auto flex size-20 items-center justify-center rounded-full bg-brand-100 text-3xl">👩‍💻</div>
        <h2 class="mt-4 text-xl font-semibold">Siti</h2>
        <p class="text-sm font-medium text-brand-600">Backend Developer</p>
        <p class="mt-2 text-sm text-neutral-500">NIM: 2410120001</p>
    </div>
</div>

@endsection