<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css'])
</head>
<body class="font-sans antialiased dark:bg-gray-800 dark:text-white/50 p-4">
<div class="text-black/50 dark:bg-gray-800 dark:text-white/50 max-w-2xl mx-auto lg:my-8">
   {{ $slot }}
</div>
</body>
</html>
