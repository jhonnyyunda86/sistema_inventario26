<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-zinc-900 dark:text-zinc-100 bg-gradient-to-br from-[#f2f6f1] via-[#fafbf9] to-[#edf3eb] dark:from-[#080d0a] dark:via-[#0c120f] dark:to-[#050806] min-h-screen relative overflow-x-hidden flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Glowing background blobs -->
        <div class="absolute -top-20 -left-20 w-80 h-80 bg-emerald-500/10 dark:bg-emerald-950/15 rounded-full blur-[80px] pointer-events-none"></div>
        <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-lime-500/10 dark:bg-lime-950/10 rounded-full blur-[80px] pointer-events-none"></div>

        <div class="relative w-full max-w-md space-y-8 z-10">
            <!-- Brand & Logo -->
            <div class="text-center">
                <a href="/" class="inline-flex flex-col items-center gap-2 group">
                    <div class="w-16 h-16 text-emerald-600 dark:text-emerald-400 group-hover:scale-110 transition-transform duration-300">
                        <x-application-logo />
                    </div>
                    <span class="font-outfit font-extrabold text-3xl tracking-tight text-zinc-950 dark:text-white mt-2">
                        Agro<span class="text-emerald-600 dark:text-emerald-400 font-medium">Stock</span>
                    </span>
                </a>
            </div>

            <!-- Card container -->
            <div class="w-full bg-white/70 dark:bg-zinc-900/60 border border-white/40 dark:border-zinc-800/40 p-8 rounded-3xl shadow-xl backdrop-blur-md">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

