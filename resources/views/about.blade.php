@extends('layouts.public')

@section('title', 'About')

@section('content')

<div class="text-center">
    <h1 class="text-4xl font-bold">Tentang Kami</h1>
    <p class="mx-auto mt-3 max-w-2xl text-neutral-500">
        Laundrycare adalah layanan perawatan dan perbaikan sepatu profesional.
    </p>
</div>

<div class="mt-12 grid gap-6 md:grid-cols-2">
    <div class="card">
        <h2 class="text-xl font-semibold">Visi</h2>
        <p class="mt-2 text-neutral-500">Menjadi aplikasi layanan laundry yang praktis, terpercaya, dan inovatif dalam memberikan kemudahan kepada masyarakat untuk memenuhi kebutuhan laundry secara cepat dan efisien.</p>
    </div>
    <div class="card">
        <h2 class="text-xl font-semibold">Misi</h2>
        <p class="mt-2 text-neutral-500">Menyediakan layanan laundry yang mudah diakses, praktis, dan efisien melalui aplikasi, memberikan informasi layanan secara transparan mulai dari jenis layanan, harga, hingga status proses laundry, meningkatkan kualitas pelayanan dengan mengutamakan kepuasan dan kenyamanan pelanggan, memanfaatkan teknologi digital untuk mempermudah proses pemesanan dan pembayaran, serta membangun kepercayaan pelanggan melalui pelayanan yang profesional, aman, dan bertanggung jawab.</p>
    </div>
</div>

@endsection