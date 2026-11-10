@props(['username'])

@php
    $link = 'block rounded-md px-3 py-2 text-amber-100 hover:bg-white/15 hover:text-white';
    $aktif = 'bg-white/15 text-white';
@endphp

<aside class="bg-stone-800 text-white md:sticky md:top-0 md:flex md:h-screen md:w-60 md:shrink-0 md:flex-col md:p-5">

    <div class="flex items-center justify-between px-4 py-3 md:mb-6 md:p-0">
        <a href="{{ route('dashboard') }}" class="text-lg font-bold">Kopi Ilkom</a>

        <button type="button" id="menu-toggle" aria-label="Buka menu" aria-expanded="false"
                class="rounded-md p-2 hover:bg-white/15 md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <nav id="menu" class="hidden space-y-1 px-4 pb-4 md:flex md:flex-1 md:flex-col md:gap-1 md:space-y-0 md:p-0">
        <a href="{{ route('dashboard') }}" class="{{ $link }} {{ request()->routeIs('dashboard') ? $aktif : '' }}">Dashboard</a>
        <a href="{{ route('pengelolaan') }}" class="{{ $link }} {{ request()->routeIs('pengelolaan') ? $aktif : '' }}">Pengelolaan</a>
        <a href="{{ route('profile') }}" class="{{ $link }} {{ request()->routeIs('profile') ? $aktif : '' }}">Profil</a>
        <form action="{{ route('logout') }}" method="POST" class="md:mt-auto">
            @csrf
            <button type="submit" class="w-full rounded-md bg-amber-700 px-3 py-2 text-center text-white hover:bg-amber-800">Keluar</button>
        </form>
    </nav>
</aside>

<script>
    const tombol = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    tombol.addEventListener('click', () => {
        const terbuka = menu.classList.toggle('hidden') === false;
        tombol.setAttribute('aria-expanded', terbuka);
    });
</script>