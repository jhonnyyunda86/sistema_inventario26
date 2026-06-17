<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AgroStock | Sistema de Gestión de Inventario Agrícola</title>

        <!-- Google Fonts: Plus Jakarta Sans & Outfit -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <!-- Fallback Tailwind CSS compilation via CDN for instant preview compatibility -->
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    darkMode: 'media',
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                                outfit: ['Outfit', 'sans-serif'],
                            },
                            colors: {
                                brand: {
                                    50: '#f0fdf4',
                                    100: '#dcfce7',
                                    200: '#bbf7d0',
                                    500: '#10b981',
                                    600: '#059669',
                                    700: '#047857',
                                    900: '#064e3b',
                                },
                            }
                        }
                    }
                }
            </script>
        @endif

        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
            .font-outfit {
                font-family: 'Outfit', sans-serif;
            }
            .glassmorphism {
                background: rgba(255, 255, 255, 0.75);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
            .dark .glassmorphism {
                background: rgba(15, 23, 42, 0.45);
            }
            /* Smooth custom animations */
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
            .animate-pulse-slow {
                animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
        </style>
    </head>
    <body class="bg-gradient-to-br from-[#f7f9f6] via-[#fafbf9] to-[#f2f6f1] dark:from-[#0b0f0d] dark:via-[#0c1310] dark:to-[#090b0a] text-zinc-800 dark:text-zinc-100 min-h-screen selection:bg-emerald-500 selection:text-white antialiased">
        
        <!-- Glowing background blobs for rich modern aesthetic -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-300/20 dark:bg-emerald-950/20 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute top-1/3 right-1/4 w-[500px] h-[500px] bg-lime-300/10 dark:bg-lime-950/10 rounded-full blur-[130px] pointer-events-none"></div>

        <!-- Navigation Bar -->
        <header class="sticky top-0 z-50 w-full glassmorphism border-b border-emerald-900/10 dark:border-emerald-100/5 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                
                <!-- Logo and Branding -->
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 text-emerald-600 dark:text-emerald-400 group-hover:scale-110 transition-transform duration-300">
                        <x-application-logo />
                    </div>
                    <span class="font-outfit font-extrabold text-2xl tracking-tight text-zinc-900 dark:text-white">
                        Agro<span class="text-emerald-600 dark:text-emerald-400 font-medium">Stock</span>
                    </span>
                </a>

                <!-- Navigation Center (Scroll links) -->
                <nav class="hidden md:flex items-center gap-8 font-medium text-sm text-zinc-600 dark:text-zinc-400">
                    <a href="#features" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">Características</a>
                    <a href="#calculator" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">Simulador</a>
                    <a href="#metrics" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">Métricas</a>
                    <a href="#faq" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">Preguntas Frecuentes</a>
                </nav>

                <!-- Auth Operations -->
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-emerald-600 hover:bg-emerald-700 shadow-md shadow-emerald-600/15 transition-all duration-200">
                                Panel de Control
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-zinc-700 dark:text-zinc-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors px-3 py-2">
                                Iniciar Sesión
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-sm font-semibold text-white bg-emerald-600 hover:bg-emerald-700 hover:scale-[1.02] shadow-md shadow-emerald-500/10 active:scale-95 transition-all duration-200">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-20 lg:pt-20 lg:pb-32">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- Left Content -->
                <div class="lg:col-span-6 flex flex-col justify-center text-left">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold text-emerald-700 dark:text-emerald-300 bg-emerald-100/50 dark:bg-emerald-950/40 w-fit mb-6 border border-emerald-500/15">
                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-ping"></span>
                        Gestión Agrícola Inteligente v1.0
                    </span>
                    
                    <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight leading-none text-zinc-900 dark:text-white">
                        Precisión y control para tu <span class="bg-gradient-to-r from-emerald-600 to-lime-500 bg-clip-text text-transparent">inventario agrícola</span>
                    </h1>
                    
                    <p class="mt-6 text-base sm:text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed max-w-xl">
                        Optimiza la trazabilidad de tus cosechas, controla tus existencias de insumos y fertilizantes, gestiona proveedores y reduce pérdidas con alertas inteligentes de humedad, caducidad y stock mínimo.
                    </p>

                    <!-- CTAs -->
                    <div class="mt-10 flex flex-wrap gap-4 items-center">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 rounded-xl text-base font-bold text-white bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 shadow-lg shadow-emerald-600/20 hover:shadow-emerald-600/30 hover:scale-[1.02] active:scale-95 transition-all duration-200">
                            Comenzar Gratis
                        </a>
                        <a href="#calculator" class="inline-flex items-center justify-center px-6 py-4 rounded-xl text-base font-semibold text-zinc-700 dark:text-zinc-300 bg-zinc-200/50 dark:bg-zinc-800/40 hover:bg-zinc-200 dark:hover:bg-zinc-800 border border-zinc-300/30 dark:border-zinc-700/30 transition-all duration-200">
                            Ver Simulador
                        </a>
                    </div>

                    <!-- Trust indicators -->
                    <div class="mt-12 pt-8 border-t border-zinc-200/50 dark:border-zinc-800/50 grid grid-cols-3 gap-6">
                        <div>
                            <span class="block text-2xl font-extrabold font-outfit text-emerald-600 dark:text-emerald-400">100%</span>
                            <span class="text-xs text-zinc-500 dark:text-zinc-500 font-medium">Trazabilidad Orgánica</span>
                        </div>
                        <div>
                            <span class="block text-2xl font-extrabold font-outfit text-emerald-600 dark:text-emerald-400">&lt;2 hrs</span>
                            <span class="text-xs text-zinc-500 dark:text-zinc-500 font-medium">Alertas de Stock</span>
                        </div>
                        <div>
                            <span class="block text-2xl font-extrabold font-outfit text-emerald-600 dark:text-emerald-400">24/7</span>
                            <span class="text-xs text-zinc-500 dark:text-zinc-500 font-medium">Soporte en Finca</span>
                        </div>
                    </div>
                </div>

                <!-- Right Simulated Dashboard Mockup (WOW Factor) -->
                <div class="lg:col-span-6 relative">
                    <div class="absolute -inset-1.5 bg-gradient-to-tr from-emerald-500 to-lime-400 rounded-3xl blur opacity-30 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                    
                    <div class="relative glassmorphism border border-white/40 dark:border-zinc-800/50 rounded-2xl shadow-2xl overflow-hidden animate-float">
                        <!-- Dashboard Mockup Header -->
                        <div class="bg-zinc-100/90 dark:bg-zinc-900/95 px-6 py-4 flex items-center justify-between border-b border-zinc-200/30 dark:border-zinc-800/40">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                                <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                            </div>
                            <span class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest font-outfit">AgroStock - Monitoreo de Bodega</span>
                            <div class="w-4 h-4 bg-emerald-500/20 rounded-full flex items-center justify-center">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                            </div>
                        </div>

                        <!-- Dashboard Mockup Content -->
                        <div class="p-6 space-y-6">
                            
                            <!-- Stats row -->
                            <div class="grid grid-cols-3 gap-4">
                                <div class="bg-white/80 dark:bg-zinc-800/60 p-3.5 rounded-xl border border-zinc-200/30 dark:border-zinc-700/20 shadow-sm">
                                    <span class="text-[10px] text-zinc-500 dark:text-zinc-400 font-semibold block uppercase">Cosecha Total</span>
                                    <span class="text-lg font-bold font-outfit text-zinc-950 dark:text-white">12,450 kg</span>
                                    <span class="text-[10px] text-emerald-600 dark:text-emerald-400 block font-medium mt-1">↑ 14% Lote C</span>
                                </div>
                                <div class="bg-white/80 dark:bg-zinc-800/60 p-3.5 rounded-xl border border-zinc-200/30 dark:border-zinc-700/20 shadow-sm">
                                    <span class="text-[10px] text-zinc-500 dark:text-zinc-400 font-semibold block uppercase">Insumos Críticos</span>
                                    <span class="text-lg font-bold font-outfit text-amber-500 dark:text-amber-400">2 Alertas</span>
                                    <span class="text-[10px] text-zinc-400 dark:text-zinc-500 block font-medium mt-1">NPK y Urea</span>
                                </div>
                                <div class="bg-white/80 dark:bg-zinc-800/60 p-3.5 rounded-xl border border-zinc-200/30 dark:border-zinc-700/20 shadow-sm">
                                    <span class="text-[10px] text-zinc-500 dark:text-zinc-400 font-semibold block uppercase">Valor Activo</span>
                                    <span class="text-lg font-bold font-outfit text-zinc-950 dark:text-white">$45,820 USD</span>
                                    <span class="text-[10px] text-zinc-400 dark:text-zinc-500 block font-medium mt-1">Valuación actual</span>
                                </div>
                            </div>

                            <!-- Crop charts simulation -->
                            <div class="bg-white/80 dark:bg-zinc-800/60 p-5 rounded-xl border border-zinc-200/30 dark:border-zinc-700/20 shadow-sm space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-zinc-800 dark:text-zinc-200 font-outfit">Capacidad de Almacenamiento por Silo</span>
                                    <span class="text-[10px] font-semibold text-emerald-600 dark:text-emerald-400">Bodega Principal (Silo A-F)</span>
                                </div>
                                <div class="space-y-2.5">
                                    <div>
                                        <div class="flex justify-between text-[10px] mb-1">
                                            <span class="text-zinc-500 dark:text-zinc-400">Silo A (Maíz Grano)</span>
                                            <span class="font-bold text-zinc-700 dark:text-zinc-300">82% (4,100 / 5,000 kg)</span>
                                        </div>
                                        <div class="w-full bg-zinc-200 dark:bg-zinc-700 h-2 rounded-full overflow-hidden">
                                            <div class="bg-emerald-500 h-full rounded-full" style="width: 82%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-[10px] mb-1">
                                            <span class="text-zinc-500 dark:text-zinc-400">Silo B (Café Pergamino)</span>
                                            <span class="font-bold text-zinc-700 dark:text-zinc-300">45% (2,250 / 5,000 kg)</span>
                                        </div>
                                        <div class="w-full bg-zinc-200 dark:bg-zinc-700 h-2 rounded-full overflow-hidden">
                                            <div class="bg-lime-500 h-full rounded-full" style="width: 45%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Live movements / Notifications -->
                            <div class="space-y-3">
                                <span class="text-xs font-bold text-zinc-800 dark:text-zinc-200 block font-outfit">Últimos Movimientos de Inventario</span>
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between bg-white/50 dark:bg-zinc-900/30 p-2.5 rounded-lg text-xs border border-zinc-200/20">
                                        <div class="flex items-center gap-2.5">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-sm shadow-emerald-500/50"></span>
                                            <span class="font-medium text-zinc-700 dark:text-zinc-300">Entrada: Café Orgánico (Lote 04)</span>
                                        </div>
                                        <span class="text-[10px] text-zinc-400 dark:text-zinc-500 font-semibold">+ 1,200 kg</span>
                                    </div>
                                    <div class="flex items-center justify-between bg-white/50 dark:bg-zinc-900/30 p-2.5 rounded-lg text-xs border border-zinc-200/20">
                                        <div class="flex items-center gap-2.5">
                                            <span class="w-2 h-2 rounded-full bg-red-500 shadow-sm shadow-red-500/50"></span>
                                            <span class="font-medium text-zinc-700 dark:text-zinc-300">Salida: Fertilizante Urea (Uso Lote A)</span>
                                        </div>
                                        <span class="text-[10px] text-zinc-400 dark:text-zinc-500 font-semibold">- 150 kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Features Grid Section -->
        <section id="features" class="bg-white/40 dark:bg-zinc-900/20 py-20 lg:py-32 border-y border-zinc-200/30 dark:border-zinc-800/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16 lg:mb-24">
                    <span class="text-xs font-bold uppercase tracking-widest text-emerald-600 dark:text-emerald-400 block mb-2 font-outfit">Control Absoluto</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold font-outfit tracking-tight text-zinc-900 dark:text-white">
                        Todo lo que necesitas para tu inventario del campo
                    </h2>
                    <p class="mt-4 text-zinc-600 dark:text-zinc-400 text-base">
                        Diseñado especialmente para agricultores, cooperativas e ingenieros agrónomos. Simplifica el flujo de bodega sin papeleo innecesario.
                    </p>
                </div>

                <!-- Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Card 1 -->
                    <div class="bg-white dark:bg-zinc-800/40 p-8 rounded-2xl border border-zinc-200/40 dark:border-zinc-700/30 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all duration-300 group">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <!-- Crop icon SVG -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="font-outfit font-bold text-xl text-zinc-900 dark:text-white">Control de Insumos</h3>
                        <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Registra fertilizantes, insecticidas, herramientas y semillas. Controla lotes de compra, proveedores e historial de precios.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white dark:bg-zinc-800/40 p-8 rounded-2xl border border-zinc-200/40 dark:border-zinc-700/30 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all duration-300 group">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <!-- Track icon SVG -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                        </div>
                        <h3 class="font-outfit font-bold text-xl text-zinc-900 dark:text-white">Trazabilidad de Cosechas</h3>
                        <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Asocia cada carga recibida en bodega al lote o hectárea sembrada correspondiente para certificar el origen orgánico o convencional.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white dark:bg-zinc-800/40 p-8 rounded-2xl border border-zinc-200/40 dark:border-zinc-700/30 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all duration-300 group">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <!-- Alert icon SVG -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <h3 class="font-outfit font-bold text-xl text-zinc-900 dark:text-white">Alertas Inteligentes</h3>
                        <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Recibe notificaciones automáticas cuando un fertilizante o semilla esté cerca de expirar, o cuando las existencias desciendan del stock mínimo.
                        </p>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white dark:bg-zinc-800/40 p-8 rounded-2xl border border-zinc-200/40 dark:border-zinc-700/30 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all duration-300 group">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <!-- Users icon SVG -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="font-outfit font-bold text-xl text-zinc-900 dark:text-white">Roles y Proveedores</h3>
                        <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Asigna roles (Capataz, Administrador, Auditor). Lleva un directorio con historial de entregas de cada proveedor agrícola.
                        </p>
                    </div>

                    <!-- Card 5 -->
                    <div class="bg-white dark:bg-zinc-800/40 p-8 rounded-2xl border border-zinc-200/40 dark:border-zinc-700/30 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all duration-300 group">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <!-- Report icon SVG -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z" />
                            </svg>
                        </div>
                        <h3 class="font-outfit font-bold text-xl text-zinc-900 dark:text-white">Reportes de Rendimiento</h3>
                        <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Grafica el consumo de insumos por temporada. Valora tu stock en tiempo real según los precios de mercado configurables.
                        </p>
                    </div>

                    <!-- Card 6 -->
                    <div class="bg-white dark:bg-zinc-800/40 p-8 rounded-2xl border border-zinc-200/40 dark:border-zinc-700/30 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all duration-300 group">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <!-- Security icon SVG -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h3 class="font-outfit font-bold text-xl text-zinc-900 dark:text-white">Bitácora & Devoluciones</h3>
                        <p class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
                            Audita entradas y salidas de bodega. Genera actas automáticas para mermas o devoluciones de productos con justificaciones detalladas.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <!-- Interactive Agricultural Calculator / Simulation Widget -->
        <section id="calculator" class="py-20 lg:py-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Inner Grid layout for widget info & simulator -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Information text -->
                    <div class="lg:col-span-5 space-y-6">
                        <span class="text-xs font-bold uppercase tracking-widest text-emerald-600 dark:text-emerald-400 block font-outfit">Simulador en Vivo</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold font-outfit text-zinc-900 dark:text-white tracking-tight leading-none">
                            Calcula tu capacidad y valor de almacenamiento
                        </h2>
                        <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed">
                            Usa nuestro simulador dinámico para estimar la cantidad de bultos (sacos de 50 kg), el volumen de espacio requerido en silos, la cotización comercial sugerida y las condiciones climáticas de conservación ideales para tus cosechas en bodega.
                        </p>
                        
                        <!-- Tip block -->
                        <div class="p-4 bg-emerald-500/5 dark:bg-emerald-500/10 border-l-4 border-emerald-500 rounded-r-xl">
                            <h4 class="text-sm font-bold text-emerald-700 dark:text-emerald-400 font-outfit">¿Sabías qué?</h4>
                            <p class="text-xs text-zinc-600 dark:text-zinc-400 mt-1 leading-relaxed">
                                Mantener el café por encima del 12% de humedad puede propiciar hongos que arruinan toda la calidad en taza de la bodega. AgroStock monitorea esto por ti.
                            </p>
                        </div>
                    </div>

                    <!-- Calculator Widget Container (Glassmorphic) -->
                    <div class="lg:col-span-7 bg-white dark:bg-zinc-800/40 border border-zinc-200/40 dark:border-zinc-700/30 p-8 rounded-3xl shadow-xl space-y-6">
                        <div class="flex items-center justify-between border-b border-zinc-200/40 dark:border-zinc-700/30 pb-4">
                            <h3 class="font-outfit font-extrabold text-xl text-zinc-900 dark:text-white">Calculadora de Acopio</h3>
                            <span class="text-xs text-zinc-400 dark:text-zinc-500">Actualizado con precios de mercado</span>
                        </div>

                        <!-- Calculator Inputs -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="cropSelect" class="block text-xs font-bold uppercase text-zinc-500 dark:text-zinc-400 mb-2">Selecciona tu Cultivo / Producto</label>
                                <select id="cropSelect" class="w-full bg-zinc-100 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none transition-all">
                                    <option value="cafe">Café Pergamino (Especial)</option>
                                    <option value="maiz" selected>Maíz Grano Amarillo</option>
                                    <option value="cacao">Cacao Orgánico Fino de Aroma</option>
                                    <option value="papa">Papa Pastusa en Bulto</option>
                                    <option value="aguacate">Aguacate Hass para Exportación</option>
                                </select>
                            </div>
                            <div>
                                <label for="weightInput" class="block text-xs font-bold uppercase text-zinc-500 dark:text-zinc-400 mb-2">Cantidad Estimada (Kilogramos - kg)</label>
                                <input type="number" id="weightInput" value="5000" min="50" step="50" class="w-full bg-zinc-100 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none transition-all" />
                            </div>
                        </div>

                        <!-- Interactive Results Layout -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 pt-4">
                            
                            <!-- Result 1 -->
                            <div class="bg-zinc-100/50 dark:bg-zinc-900/40 p-4 rounded-xl border border-zinc-200/20">
                                <span class="text-[10px] text-zinc-500 dark:text-zinc-400 font-semibold block uppercase">Sacos Equivalentes</span>
                                <span id="resSacks" class="text-2xl font-bold font-outfit text-emerald-600 dark:text-emerald-400 mt-1">100 sacos</span>
                                <span class="text-[9px] text-zinc-400 dark:text-zinc-500 block mt-1">Basado en sacos de 50 kg</span>
                            </div>

                            <!-- Result 2 -->
                            <div class="bg-zinc-100/50 dark:bg-zinc-900/40 p-4 rounded-xl border border-zinc-200/20">
                                <span class="text-[10px] text-zinc-500 dark:text-zinc-400 font-semibold block uppercase">Valuación del Lote</span>
                                <span id="resValuation" class="text-2xl font-bold font-outfit text-zinc-900 dark:text-white mt-1">$1,400 USD</span>
                                <span class="text-[9px] text-zinc-400 dark:text-zinc-500 block mt-1">Precio comercial de mercado</span>
                            </div>

                            <!-- Result 3 -->
                            <div class="bg-zinc-100/50 dark:bg-zinc-900/40 p-4 rounded-xl border border-zinc-200/20 sm:col-span-2 lg:col-span-1">
                                <span class="text-[10px] text-zinc-500 dark:text-zinc-400 font-semibold block uppercase">Volumen de Espacio</span>
                                <span id="resVolume" class="text-2xl font-bold font-outfit text-zinc-900 dark:text-white mt-1">6.67 m³</span>
                                <span class="text-[9px] text-zinc-400 dark:text-zinc-500 block mt-1">Espacio físico requerido</span>
                            </div>

                        </div>

                        <!-- Climate parameters recommendation -->
                        <div class="bg-gradient-to-tr from-emerald-500/10 to-lime-500/10 p-5 rounded-2xl border border-emerald-500/10 space-y-3">
                            <span class="text-xs font-bold text-emerald-800 dark:text-emerald-400 block font-outfit uppercase tracking-wider">Parámetros de Conservación Recomendados</span>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-500/15 flex items-center justify-center text-emerald-600 dark:text-emerald-400 shrink-0">
                                        <!-- Temperature thermometer icon -->
                                        <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-[9px] text-zinc-400 dark:text-zinc-500 block uppercase font-medium">Temperatura</span>
                                        <span id="recTemp" class="text-sm font-bold text-zinc-800 dark:text-zinc-200 font-outfit">12°C - 15°C</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-500/15 flex items-center justify-center text-emerald-600 dark:text-emerald-400 shrink-0">
                                        <!-- Humidity water drops icon -->
                                        <svg class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 9.172V5L8 4z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="text-[9px] text-zinc-400 dark:text-zinc-500 block uppercase font-medium">Humedad Máx.</span>
                                        <span id="recHum" class="text-sm font-bold text-zinc-800 dark:text-zinc-200 font-outfit">13%</span>
                                    </div>
                                </div>
                            </div>

                            <p id="recAdvice" class="text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed border-t border-emerald-500/15 pt-2 mt-2">
                                * Mantenga el silo cerrado herméticamente. Evite filtraciones y realice controles mensuales de CO₂.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Live Metrics / Social Proof Section -->
        <section id="metrics" class="bg-white/40 dark:bg-zinc-900/20 py-20 lg:py-32 border-y border-zinc-200/30 dark:border-zinc-800/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left: Numerical Metrics -->
                    <div class="lg:col-span-6 grid grid-cols-2 gap-8 text-left">
                        <div class="space-y-2">
                            <span class="text-5xl font-extrabold font-outfit text-emerald-600 dark:text-emerald-400">+10k</span>
                            <h4 class="font-outfit font-bold text-lg text-zinc-900 dark:text-white">Toneladas Administradas</h4>
                            <p class="text-xs text-zinc-500 dark:text-zinc-500 leading-relaxed">
                                De granos y semillas registradas en bodegas cooperativas de toda la región.
                            </p>
                        </div>
                        <div class="space-y-2">
                            <span class="text-5xl font-extrabold font-outfit text-emerald-600 dark:text-emerald-400">99.8%</span>
                            <h4 class="font-outfit font-bold text-lg text-zinc-900 dark:text-white">Precisión de Inventario</h4>
                            <p class="text-xs text-zinc-500 dark:text-zinc-500 leading-relaxed">
                                Conciliación exitosa entre la auditoría física en bodega y los registros de AgroStock.
                            </p>
                        </div>
                        <div class="space-y-2">
                            <span class="text-5xl font-extrabold font-outfit text-emerald-600 dark:text-emerald-400">12</span>
                            <h4 class="font-outfit font-bold text-lg text-zinc-900 dark:text-white">Tipos de Cultivos</h4>
                            <p class="text-xs text-zinc-500 dark:text-zinc-500 leading-relaxed">
                                Parámetros específicos de humedad y densidad preconfigurados listos para usar.
                            </p>
                        </div>
                        <div class="space-y-2">
                            <span class="text-5xl font-extrabold font-outfit text-emerald-600 dark:text-emerald-400">0%</span>
                            <h4 class="font-outfit font-bold text-lg text-zinc-900 dark:text-white">Pérdida de Información</h4>
                            <p class="text-xs text-zinc-500 dark:text-zinc-500 leading-relaxed">
                                Base de datos segura e historial inmutable de auditorías y movimientos.
                            </p>
                        </div>
                    </div>

                    <!-- Right: Dynamic User Story Card -->
                    <div class="lg:col-span-6 bg-white dark:bg-zinc-800/40 p-8 rounded-3xl border border-zinc-200/40 dark:border-zinc-700/30 shadow-lg relative overflow-hidden flex flex-col justify-between h-96">
                        
                        <!-- Leaf backdrop shape -->
                        <div class="absolute -right-16 -top-16 w-48 h-48 bg-emerald-500/10 dark:bg-emerald-500/20 rounded-full blur-xl pointer-events-none"></div>

                        <!-- Quote Header -->
                        <div class="flex items-center gap-1 text-emerald-500">
                            <!-- Star icon (5 times) -->
                            @for ($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>

                        <!-- Testimonial Quote -->
                        <p class="text-zinc-600 dark:text-zinc-300 text-base italic leading-relaxed relative z-10">
                            "Antes de AgroStock, llevar el conteo de insumos de fertilizante y la trazabilidad de la cosecha de aguacate era una pesadilla en hojas de cálculo. Ahora el capataz registra todo desde el móvil en la bodega y yo veo los reportes de valorización al instante en la oficina."
                        </p>

                        <!-- User Profile Info -->
                        <div class="flex items-center gap-4 mt-6 border-t border-zinc-200/40 dark:border-zinc-700/30 pt-6">
                            <div class="w-12 h-12 rounded-full bg-emerald-700 font-outfit font-extrabold text-white flex items-center justify-center text-sm shadow-inner shadow-black/20 shrink-0">
                                HM
                            </div>
                            <div>
                                <span class="block font-outfit font-bold text-sm text-zinc-950 dark:text-white">Hugo Mendoza</span>
                                <span class="text-xs text-zinc-500 dark:text-zinc-400 font-medium">Administrador, Finca "El Paraíso"</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Interactive FAQ Accordion -->
        <section id="faq" class="py-20 lg:py-32">
            <div class="max-w-4xl mx-auto px-4 sm:px-6">
                
                <div class="text-center mb-16">
                    <span class="text-xs font-bold uppercase tracking-widest text-emerald-600 dark:text-emerald-400 block mb-2 font-outfit">Resolviendo Dudas</span>
                    <h2 class="text-3xl font-extrabold font-outfit text-zinc-900 dark:text-white tracking-tight">Preguntas Frecuentes</h2>
                    <p class="text-zinc-600 dark:text-zinc-400 text-sm mt-3">Todo lo que necesitas saber para integrar la plataforma en tu negocio agrícola.</p>
                </div>

                <!-- Accordion details elements -->
                <div class="space-y-4">
                    
                    <details class="group bg-white dark:bg-zinc-800/40 rounded-2xl border border-zinc-200/40 dark:border-zinc-700/30 overflow-hidden shadow-sm transition-all" open>
                        <summary class="flex justify-between items-center p-6 text-sm font-bold text-zinc-900 dark:text-white cursor-pointer select-none font-outfit list-none">
                            <span>¿Es compatible con bodegas sin acceso constante a internet?</span>
                            <span class="text-emerald-600 dark:text-emerald-400 transition-transform group-open:rotate-180">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                            </span>
                        </summary>
                        <div class="px-6 pb-6 text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed border-t border-zinc-200/10 dark:border-zinc-700/10 pt-4">
                            Sí. El sistema permite realizar registros de acopio locales temporales. Al recuperar conectividad, la aplicación sincroniza los inventarios y las auditorías pendientes con el servidor central para mantener los silos actualizados.
                        </div>
                    </details>

                    <details class="group bg-white dark:bg-zinc-800/40 rounded-2xl border border-zinc-200/40 dark:border-zinc-700/30 overflow-hidden shadow-sm transition-all">
                        <summary class="flex justify-between items-center p-6 text-sm font-bold text-zinc-900 dark:text-white cursor-pointer select-none font-outfit list-none">
                            <span>¿Cómo maneja las alertas de humedad y temperatura?</span>
                            <span class="text-emerald-600 dark:text-emerald-400 transition-transform group-open:rotate-180">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                            </span>
                        </summary>
                        <div class="px-6 pb-6 text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed border-t border-zinc-200/10 dark:border-zinc-700/10 pt-4">
                            Al registrar un lote de acopio, puedes ingresar sus mediciones actuales de temperatura y humedad. AgroStock las contrastará con los límites recomendados del cultivo y generará alertas instantáneas en la pantalla principal si se detectan valores peligrosos.
                        </div>
                    </details>

                    <details class="group bg-white dark:bg-zinc-800/40 rounded-2xl border border-zinc-200/40 dark:border-zinc-700/30 overflow-hidden shadow-sm transition-all">
                        <summary class="flex justify-between items-center p-6 text-sm font-bold text-zinc-900 dark:text-white cursor-pointer select-none font-outfit list-none">
                            <span>¿Se pueden imprimir actas de recepción y entrega de insumos?</span>
                            <span class="text-emerald-600 dark:text-emerald-400 transition-transform group-open:rotate-180">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                            </span>
                        </summary>
                        <div class="px-6 pb-6 text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed border-t border-zinc-200/10 dark:border-zinc-700/10 pt-4">
                            Sí. El sistema permite descargar e imprimir actas de movimientos (entradas y salidas) firmadas digitalmente por los operarios de la finca para llevar un control estricto de auditoría y evitar desvíos o pérdidas inexplicables.
                        </div>
                    </details>

                </div>
            </div>
        </section>

        <!-- CTA Final Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 lg:pb-32">
            <div class="relative rounded-3xl bg-gradient-to-r from-emerald-600 to-emerald-800 text-white p-8 sm:p-12 lg:p-20 overflow-hidden shadow-xl shadow-emerald-900/10">
                
                <!-- Absolute glowing circle details -->
                <div class="absolute right-0 bottom-0 w-80 h-80 bg-lime-400/20 rounded-full blur-[60px] pointer-events-none"></div>
                <div class="absolute left-10 top-0 w-60 h-60 bg-emerald-400/20 rounded-full blur-[50px] pointer-events-none"></div>

                <div class="relative z-10 max-w-3xl space-y-6">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-outfit tracking-tight leading-none">
                        Lleva la administración de tu finca al siguiente nivel
                    </h2>
                    <p class="text-sm sm:text-base text-emerald-100 max-w-xl leading-relaxed">
                        Regístrate hoy mismo y configura tus primeros silos, categorías de insumos y roles de trabajo. Mantén el inventario de tu campo seguro, preciso y accesible.
                    </p>
                    <div class="pt-4 flex flex-wrap gap-4">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 rounded-xl text-base font-bold text-emerald-900 bg-white hover:bg-emerald-50 hover:scale-[1.02] active:scale-95 transition-all duration-200">
                            Registrar Mi Finca
                        </a>
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-6 py-4 rounded-xl text-base font-semibold text-white bg-emerald-700/60 hover:bg-emerald-700/90 border border-emerald-500/30 transition-all duration-200">
                            Ingresar
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="bg-zinc-900 text-zinc-400 border-t border-zinc-800 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 pb-8 border-b border-zinc-800">
                    
                    <!-- Branding col -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 text-emerald-400">
                                <x-application-logo />
                            </div>
                            <span class="font-outfit font-extrabold text-xl tracking-tight text-white">
                                Agro<span class="text-emerald-400 font-medium">Stock</span>
                            </span>
                        </div>
                        <p class="text-xs leading-relaxed text-zinc-500">
                            Gestión Inteligente de Inventario y Almacenamiento Agrícola de Precisión.
                        </p>
                    </div>

                    <!-- Sitemap col 1 -->
                    <div>
                        <h5 class="text-sm font-bold text-white mb-4 uppercase tracking-wider font-outfit">Plataforma</h5>
                        <ul class="space-y-2.5 text-xs">
                            <li><a href="#features" class="hover:text-emerald-400 transition-colors">Características</a></li>
                            <li><a href="#calculator" class="hover:text-emerald-400 transition-colors">Simulador de Acopio</a></li>
                            <li><a href="#metrics" class="hover:text-emerald-400 transition-colors">Métricas del Campo</a></li>
                        </ul>
                    </div>

                    <!-- Sitemap col 2 -->
                    <div>
                        <h5 class="text-sm font-bold text-white mb-4 uppercase tracking-wider font-outfit">Soporte</h5>
                        <ul class="space-y-2.5 text-xs">
                            <li><a href="#faq" class="hover:text-emerald-400 transition-colors">Preguntas Frecuentes</a></li>
                            <li><a href="mailto:soporte@agrostock.com" class="hover:text-emerald-400 transition-colors">Contacto Técnico</a></li>
                            <li><a href="#" class="hover:text-emerald-400 transition-colors">Manual de Usuario</a></li>
                        </ul>
                    </div>

                    <!-- System Information -->
                    <div class="text-xs space-y-2.5">
                        <h5 class="text-sm font-bold text-white mb-4 uppercase tracking-wider font-outfit">Información</h5>
                        <p>Laravel v{{ app()->version() }}</p>
                        <p>PHP v{{ PHP_VERSION }}</p>
                        <p class="text-zinc-600 dark:text-zinc-500">&copy; {{ date('Y') }} AgroStock. Todos los derechos reservados.</p>
                    </div>

                </div>

                <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-zinc-600">
                    <p>Desarrollado con fines de excelencia estética y agilidad operativa.</p>
                    <div class="flex gap-4 mt-4 sm:mt-0">
                        <a href="#" class="hover:text-zinc-400">Términos y Condiciones</a>
                        <span>&middot;</span>
                        <a href="#" class="hover:text-zinc-400">Política de Privacidad</a>
                    </div>
                </div>

            </div>
        </footer>

        <!-- Javascript logic for Interactive Storage & Valuation Calculator -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const cropSelect = document.getElementById('cropSelect');
                const weightInput = document.getElementById('weightInput');
                
                const resSacks = document.getElementById('resSacks');
                const resValuation = document.getElementById('resValuation');
                const resVolume = document.getElementById('resVolume');
                
                const recTemp = document.getElementById('recTemp');
                const recHum = document.getElementById('recHum');
                const recAdvice = document.getElementById('recAdvice');

                // Metadata config for calculations
                const cropData = {
                    maiz: {
                        density: 0.75, // kg per liter
                        temp: "12°C - 15°C",
                        humidity: "13% H.M.",
                        price: 0.28, // USD per kg
                        advice: "* Guarde en un silo ventilado para evitar condensación. Monitoree presencia de gorgojos bimestralmente."
                    },
                    cafe: {
                        density: 0.45,
                        temp: "18°C - 21°C",
                        humidity: "11.5% H.M.",
                        price: 3.50,
                        advice: "* Mantener en sacos de yute o bolsas GrainPro sobre estibas de madera. Evite el contacto directo con paredes."
                    },
                    cacao: {
                        density: 0.50,
                        temp: "20°C - 24°C",
                        humidity: "7.5% H.M.",
                        price: 4.20,
                        advice: "* Requiere ventilación cruzada y protección solar directa. Mantener alejado de insumos olorosos (pesticidas)."
                    },
                    papa: {
                        density: 0.65,
                        temp: "4°C - 7°C",
                        humidity: "90% H.M.",
                        price: 0.45,
                        advice: "* Almacene en oscuridad absoluta para evitar brotación y solanina. Requiere alta humedad relativa pero sin encharcamiento."
                    },
                    aguacate: {
                        density: 0.60,
                        temp: "5°C - 8°C",
                        humidity: "85% H.M.",
                        price: 2.10,
                        advice: "* Almacenamiento en cámaras frigoríficas con atmósfera controlada (bajo O₂ y CO₂). Vida útil en bodega limitada a 15-20 días."
                    }
                };

                function performCalculations() {
                    const selectedCrop = cropSelect.value;
                    const weight = parseFloat(weightInput.value) || 0;
                    
                    const data = cropData[selectedCrop];
                    if (!data) return;

                    // Sacos (assuming standard 50 kg bag)
                    const sacksCount = Math.ceil(weight / 50);
                    resSacks.textContent = `${sacksCount} saco${sacksCount !== 1 ? 's' : ''}`;

                    // Market valuation
                    const valAmount = weight * data.price;
                    resValuation.textContent = `$${valAmount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} USD`;

                    // Physical volume in cubic meters (Volume = weight / density in kg/L, then divide by 1000 to get m³)
                    const volumeM3 = (weight / data.density) / 1000;
                    resVolume.textContent = `${volumeM3.toFixed(2)} m³`;

                    // Set storage conditions recommendations
                    recTemp.textContent = data.temp;
                    recHum.textContent = data.humidity;
                    recAdvice.textContent = data.advice;
                }

                // Attach listeners
                cropSelect.addEventListener('change', performCalculations);
                weightInput.addEventListener('input', performCalculations);

                // Initial trigger
                performCalculations();
            });
        </script>
    </body>
</html>
