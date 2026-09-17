<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Web Gallery') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">

    {{-- NAVBAR --}}
    <nav class="bg-blue-800 text-white px-6 py-4 flex justify-between">
        <div class="font-bold">
            SMK Negeri 4 Bogor
        </div>

        <div class="space-x-4">
            <a href="/" class="hover:underline">Home</a>

            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
            @endauth
        </div>
    </nav>

    {{-- ISI HALAMAN --}}
    <main class="p-6">
        {{ $slot }}
    </main>

</body>
</html>
