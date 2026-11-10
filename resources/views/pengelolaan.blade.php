@extends('layouts.app')

@section('title', 'Pengelolaan — Kopi Ilkom')

@section('content')
<h1 class="text-2xl font-bold">Pengelolaan Menu Kopi</h1>
<p class="mb-5 text-stone-500">Daftar menu yang dikelola oleh {{ $username }}.</p>

<div class="overflow-x-auto rounded-xl bg-white shadow">
    <table class="w-full min-w-[480px] text-left">
        <thead class="bg-amber-100">
            <tr>
                <th class="px-3 py-2.5">#</th>
                <th class="px-3 py-2.5">Nama Menu</th>
                <th class="px-3 py-2.5">Kategori</th>
                <th class="px-3 py-2.5">Harga</th>
                <th class="px-3 py-2.5">Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as   $item)
                <tr class="border-t border-stone-100">
                    <td class="px-3 py-2.5">{{ $loop->iteration }}</td>
                    <td class="px-3 py-2.5">{{ $item['nama'] }}</td>
                    <td class="px-3 py-2.5"><span class="rounded-full bg-amber-100 px-2.5 py-0.5 text-sm">{{ $item['kategori'] }}</span></td>
                    <td class="px-3 py-2.5">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td class="px-3 py-2.5">{{ $item['stok'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
