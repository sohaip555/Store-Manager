<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Store Manager</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white">
    <div class="px-10 ">
        <nav class="flex justify-between items-center py-4 border-b border-white/50">

            <div>
                <a href="/">
                    <img width="100" src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
                </a>
            </div>

            <div class="space-x-6 font-bold">
                <a class="text-lg" href="/customer/show">Customers</a>
                <a class="text-lg" href="/product/show">Product</a>
                <a class="text-lg" href="/order/show">Orders</a>
            </div>

            <div>
                <a class="text-lg" href="">Post a Job</a>
            </div>
        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
