@extends('layouts.public')

@section('title', 'Daftar Pelanggan')

@section('content')

@if (session('status'))
    <div class="mb-6 rounded-lg border border-green-300 bg-green-50 px-4 py-3 text-center text-sm font-medium text-green-700">
        {{ session('status') }}
    </div>
@endif

<div class="text-center">
    <h1 class="text-4xl font-bold">Daftar Pelanggan</h1>
    <p class="mt-3 text-neutral-500">Kelola akun pelanggan Laundrycare.</p>
</div>

<div class="mt-10 overflow-x-auto rounded-xl border border-neutral-200 bg-white shadow-sm">
    <table class="w-full text-left text-sm">
        <thead class="bg-neutral-100 text-xs uppercase text-neutral-600">
            <tr>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Jumlah Pesanan</th>
                <th class="px-4 py-3">Terdaftar</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-neutral-200">
            @forelse ($customers as $customer)
                <tr>
                    <td class="px-4 py-3">{{ $customer->id }}</td>
                    <td class="px-4 py-3">{{ $customer->name }}</td>
                    <td class="px-4 py-3">{{ $customer->email }}</td>
                    <td class="px-4 py-3">{{ $customer->orders_count }}</td>
                    <td class="px-4 py-3">{{ $customer->created_at->format('d M Y H:i') }}</td>
                    <td class="px-4 py-3">
                        <form method="POST" action="{{ route('admin.customers.destroy', $customer) }}"
                              onsubmit="return confirm('Hapus pelanggan {{ $customer->name }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="rounded-lg bg-red-500 px-3 py-1 text-xs font-semibold text-white hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-neutral-500">Belum ada pelanggan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection