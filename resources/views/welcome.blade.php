<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Room</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles can be added here */
        /* Example: */
        .dark-mode {
            /* Dark mode styles */
            background-color: #020305;
            color: white;
        }

        .text-gradient {
            /* Gradient text color */
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: linear-gradient(180deg, #020305, #0d1b2a);
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-gray-800 dark:text-white">
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-300 dark:bg-gray-900">
        <h1 class="text-5xl font-bold mb-8 text-gradient dark:text-white">Book a Room</h1>

        <div class="space-y-4">
            @auth
            <a href="{{ url('/dashboard') }}" class="btn-primary">
                Dashboard
            </a>
            @else
            <a href="{{ route('login') }}" class="btn-primary rounded-md border border-gray-600 px-4 py-2 mx-4 transition hover:bg-gray-300 dark:hover:bg-gray-700">
                Log in
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn-secondary rounded-md border border-gray-600 px-4 py-2 mx-4 transition hover:bg-gray-300 dark:hover:bg-gray-700">
                Register
            </a>
            @endif
            @endauth
        </div>
    </div>

    <script>
        const darkModeToggle = document.querySelector('.dark-mode-toggle');

        darkModeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>

</html>