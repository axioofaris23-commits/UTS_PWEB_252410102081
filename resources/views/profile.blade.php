@extends('layouts.app')

@section('title', 'Profil — Kopi Ilkom')

@section('content')

<div class="flex min-h-[calc(100vh-120px)] items-center justify-center p-4" style="min-height: calc(100vh - 120px); display: flex; align-items: center; justify-content: center;">

    <div class="w-full max-w-[360px] bg-white rounded-2xl p-8 text-center shadow-md" style="max-width: 360px; background-color: #ffffff; border-radius: 16px; padding: 32px;">

        <div class="mx-auto mb-6 overflow-hidden rounded-full bg-gray-300" style="width: 96px; height: 96px; min-width: 96px; min-height: 96px; border-radius: 9999px; margin-left: auto; margin-right: auto; margin-bottom: 24px; background-color: #d1d5db;">
            <img
                src="{{ asset('images/Profil.jpg') }}"
                alt="Foto Profil"
                class="w-full h-full object-cover"
                style="width: 100%; height: 100%; object-fit: cover; border-radius: 9999px;"
            >
        </div>

        <div>
            <div class="mb-4" style="margin-bottom: 16px;">
                <h2 class="text-sm font-semibold text-black mb-2 text-center" style="font-size: 14px; font-weight: 600; color: #000; margin-bottom: 8px;">
                    Nama
                </h2>
                <div class="flex h-10 w-full items-center justify-center rounded-md bg-gray-300 px-3 text-sm text-black" style="display: flex; height: 40px; width: 100%; align-items: center; justify-content: center; border-radius: 6px; background-color: #d1d5db; color: #000; font-size: 14px;">
                    {{ $username ?? '-' }}
                </div>
            </div>

            <div class="mb-4" style="margin-bottom: 16px;">
                <h2 class="text-sm font-semibold text-black mb-2 text-center" style="font-size: 14px; font-weight: 600; color: #000; margin-bottom: 8px;">
                    Outlet
                </h2>
                <div class="flex h-10 w-full items-center justify-center rounded-md bg-gray-300 px-3 text-sm text-black" style="display: flex; height: 40px; width: 100%; align-items: center; justify-content: center; border-radius: 6px; background-color: #d1d5db; color: #000; font-size: 14px;">
                    {{ $info['Outlet'] ?? '-' }}
                </div>
            </div>

            <div>
                <h2 class="text-sm font-semibold text-black mb-2 text-center" style="font-size: 14px; font-weight: 600; color: #000; margin-bottom: 8px;">
                    Akses
                </h2>
                <div class="flex h-10 w-full items-center justify-center rounded-md bg-gray-300 px-3 text-sm text-black" style="display: flex; height: 40px; width: 100%; align-items: center; justify-content: center; border-radius: 6px; background-color: #d1d5db; color: #000; font-size: 14px;">
                    {{ $info['Akses'] ?? '-' }}
                </div>
            </div>

        </div>

    </div>

</div>

@endsection 