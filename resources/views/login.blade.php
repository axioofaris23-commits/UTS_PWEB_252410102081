
@extends('layouts.app')

@section('title', 'Login — Kopi Ilkom')

@section('content')

<div class="relative w-screen min-h-screen flex items-center justify-center left-1/2 -translate-x-1/2">

    <div class="w-full max-w-sm mx-4 rounded-xl bg-[#4B3428] p-6 shadow-lg sm:p-8">

        <h1 class="text-2xl font-bold text-white">
            Kopi Ilkom
        </h1>

        <p class="mb-5 text-[#E9E1D7]">
            Masuk untuk mengelola menu kopi
        </p>

        @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-100 p-3 text-sm text-white">{{ session('status') }}</div>
        @endif

        @error('login')
            <div class="mb-4 rounded-lg bg-red-100 p-3 text-sm text-red-800">{{ $message }}</div>
        @enderror

        <form action="{{ route('login.proses') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="username" class="mb-1 block font-semibold text-white">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Masukan Username"
                    class="w-full rounded-lg border border-stone-300 bg-white
                           p-2.5 text-stone-800 focus:border-amber-700
                           focus:outline-none"
                >

                @error('username')
                    <small class="text-red-300">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label for="password" class="mb-1 block font-semibold text-white">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password admin"
                    class="w-full rounded-lg border border-stone-300 bg-white
                           p-2.5 text-stone-800 focus:border-amber-700
                           focus:outline-none"
                >

                @error('password')
                    <small class="text-red-300">{{ $message }}</small>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full rounded-lg bg-[#C58B55] py-2.5
                       text-white transition hover:bg-[#A96E3C]"
            >
                Masuk
            </button>
        </form>

    </div>
</div>

@endsection