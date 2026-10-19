@extends('layouts.public')

@section('title', 'Book Online')

@section('content')

<div class="text-center">
    <h1 class="text-4xl font-bold">Book Online</h1>
    <p class="mt-3 text-neutral-500">Isi form di bawah ini untuk memesan layanan laundry atau cuci sepatu.</p>
</div>

<form method="POST" action="{{ route('order.store') }}" class="card mx-auto mt-10 max-w-lg space-y-5">
    @csrf

    {{-- Kategori --}}
    <div>
        <label for="kategori" class="mb-1 block text-sm font-medium">Kategori</label>
        <select id="kategori" name="kategori" required
                class="w-full rounded-lg border border-neutral-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
            <option value="">-- Pilih kategori --</option>
            @foreach ($daftarLayanan as $kategori => $layananList)
                <option value="{{ $kategori }}" @selected(old('kategori') === $kategori)>{{ $kategori }}</option>
            @endforeach
        </select>
        @error('kategori')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Layanan --}}
    <div>
        <label for="layanan" class="mb-1 block text-sm font-medium">Layanan</label>
        <select id="layanan" name="layanan" required
                class="w-full rounded-lg border border-neutral-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
            <option value="">-- Pilih kategori dulu --</option>
        </select>
        @error('layanan')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Jumlah --}}
    <div>
        <label for="jumlah" class="mb-1 block text-sm font-medium">
            Jumlah <span id="satuan" class="text-neutral-500">(kg / pasang)</span>
        </label>
        <input id="jumlah" type="number" name="jumlah" min="1" max="100" required
               value="{{ old('jumlah') }}"
               class="w-full rounded-lg border border-neutral-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
        @error('jumlah')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- No telepon --}}
    <div>
        <label for="no_telepon" class="mb-1 block text-sm font-medium">No. Telepon / WhatsApp</label>
        <input id="no_telepon" type="text" name="no_telepon" required
               value="{{ old('no_telepon') }}" placeholder="08xxxxxxxxxx"
               class="w-full rounded-lg border border-neutral-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
        @error('no_telepon')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Alamat --}}
    <div>
        <label for="alamat" class="mb-1 block text-sm font-medium">Alamat Jemput / Antar</label>
        <textarea id="alamat" name="alamat" rows="3" required
                  class="w-full rounded-lg border border-neutral-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('alamat') }}</textarea>
        @error('alamat')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Catatan --}}
    <div>
        <label for="catatan" class="mb-1 block text-sm font-medium">Catatan (opsional)</label>
        <textarea id="catatan" name="catatan" rows="2"
                  class="w-full rounded-lg border border-neutral-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('catatan') }}</textarea>
        @error('catatan')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit"
            class="w-full rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white transition hover:bg-blue-700">
        Kirim Pesanan
    </button>
</form>

<script>
    // Daftar layanan per kategori, diambil dari controller
    const daftarLayanan = @json($daftarLayanan);
    const layananLama = @json(old('layanan'));

    const kategoriEl = document.getElementById('kategori');
    const layananEl = document.getElementById('layanan');
    const satuanEl = document.getElementById('satuan');

    function isiLayanan() {
        const pilihan = daftarLayanan[kategoriEl.value] || [];

        layananEl.innerHTML = '';

        if (pilihan.length === 0) {
            layananEl.innerHTML = '<option value="">-- Pilih kategori dulu --</option>';
            satuanEl.textContent = '(kg / pasang)';
            return;
        }

        layananEl.innerHTML = '<option value="">-- Pilih layanan --</option>';
        pilihan.forEach(function (nama) {
            const opt = document.createElement('option');
            opt.value = nama;
            opt.textContent = nama;
            if (nama === layananLama) opt.selected = true;
            layananEl.appendChild(opt);
        });

        satuanEl.textContent = kategoriEl.value === 'Cuci Sepatu' ? '(pasang)' : '(kg)';
    }

    kategoriEl.addEventListener('change', isiLayanan);
    isiLayanan();
</script>

@endsection