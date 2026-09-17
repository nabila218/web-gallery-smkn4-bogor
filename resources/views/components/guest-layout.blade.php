<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Web Gallery SMKN 4 Bogor') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">

        <!-- LOGO -->
        <div class="flex flex-col items-center mb-6">
            <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                SMK
            </div>
            <h1 class="mt-4 text-2xl font-bold text-gray-800">
                SMK Negeri 4 Bogor
            </h1>
            <p class="text-sm text-gray-500">
                Web Gallery Sekolah
            </p>
        </div>

        {{ $slot }}

    </div>

</body>
</html>
