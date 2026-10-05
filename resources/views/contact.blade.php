@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<h2>Hubungi Kami</h2>
<form class="mt-3">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control" placeholder="Masukkan nama Anda">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="nama@email.com">
    </div>
    <div class="mb-3">
        <label class="form-label">Pesan</label>
        <textarea class="form-control" rows="4" placeholder="Tuliskan pesan Anda"></textarea>
    </div>
    <button type="button" class="btn btn-primary">Kirim Pesan</button>
</form>
@endsection