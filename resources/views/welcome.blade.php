<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-900">
        <h1 class="text-3xl font-bold mb-8 text-black dark:text-white">Book a room</h1>

        @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 mb-4 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Dashboard
        </a>
        @else
        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 mb-4 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Log in
        </a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 mb-4 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Register
        </a>
        @endif
        @endauth
        @endif
    </div>



    <main class="mt-6">



    </main>



</body>

</html>