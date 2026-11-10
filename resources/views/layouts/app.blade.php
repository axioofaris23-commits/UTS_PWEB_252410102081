<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-amber-50 text-stone-800 md:flex">
    @isset($username)
        <x-navbar :username="$username" />
    @endisset

    <div class="flex min-h-screen min-w-0 flex-1 flex-col">
        <main class="w-full flex-1 px-4 py-6 md:px-8">
            @yield('content')
        </main>

        <x-footer />
    </div>
</body>
</html>