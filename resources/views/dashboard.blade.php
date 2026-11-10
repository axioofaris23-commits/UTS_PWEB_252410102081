@extends('layouts.app')

@section('title', 'Dashboard — Kopi Ilkom')

@section('content')
<h1 class="text-2xl font-bold">Halo, {{ $username }}!</h1>
<p class="mb-5 text-stone-500">Ringkasan singkat outlet Kopi Ilkom hari ini.</p>

<div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div class="rounded-xl bg-white p-5 shadow">
        <span class="block text-sm text-stone-500">Jumlah Menu</span>
        <span class="text-3xl font-bold text-amber-700">{{ $totalMenu }}</span>
    </div>
    <div class="rounded-xl bg-white p-5 shadow">
        <span class="block text-sm text-stone-500">Total Stok</span>
        <span class="text-3xl font-bold text-amber-700">{{ $totalStok }}</span>
    </div>
</div>

<div class="rounded-xl bg-white p-5 shadow">
    <h2 class="mb-3 text-lg font-semibold">Menu Terlaris</h2>
    <ol class="mb-4 ml-5 list-decimal space-y-1">
        @foreach ($menuTerlaris as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ol>
    <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="inline-block rounded-lg bg-amber-700 px-4 py-2 text-white hover:bg-amber-800">Kelola Menu →</a>
</div>
@endsection
