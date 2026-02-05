 <!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>ACME Transportes - Sistema de Gestión Vehicular</title>
     <meta name="description" content="Sistema profesional para el registro y control de vehículos, conductores y propietarios.">

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

     <!-- Tailwind CSS (asume que tienes Tailwind configurado en tu proyecto Laravel) -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])

     <style>
         [x-cloak] { display: none !important; }
     </style>
 </head>
 <body class="min-h-screen bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-sans antialiased">


     <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-zinc-950/80 backdrop-blur-lg border-b border-zinc-200 dark:border-zinc-800">
         <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
             <div class="flex items-center justify-between h-16">

                 <a href="/" class="flex items-center gap-2 group">
                     <div class="w-9 h-9 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-500/20 group-hover:shadow-indigo-500/40 transition-shadow">
                         <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                         </svg>
                     </div>
                     <span class="text-lg font-semibold tracking-tight">ACME</span>
                 </a>


                 @if (Route::has('login'))
                 <nav class="flex items-center justify-end gap-4">
                     @auth
                         <a
                             href="{{ url('/dashboard') }}"
                             class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                         >
                             Dashboard
                         </a>
                     @else
                         <a
                             href="{{ route('login') }}"
                             class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                         >
                             Log in
                         </a>

                         @if (Route::has('register'))
                             <a
                                 href="{{ route('register') }}"
                                 class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                 Register
                             </a>
                         @endif
                     @endauth
                 </nav>
                 @endif
             </div>
         </div>
     </header>


     <div class="h-16"></div>

     <main>

         <section class="relative overflow-hidden">

             <div class="absolute inset-0 -z-10">
                 <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-100 dark:bg-indigo-950/30 rounded-full blur-3xl opacity-60"></div>
                 <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-blue-100 dark:bg-blue-950/30 rounded-full blur-3xl opacity-50"></div>
             </div>

             <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
                 <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                     <div class="text-center lg:text-left">
                         <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 dark:bg-indigo-950/50 border border-indigo-100 dark:border-indigo-900 text-indigo-600 dark:text-indigo-400 text-sm font-medium mb-6">
                             <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full animate-pulse"></span>
                             Sistema de gestión vehicular
                         </div>

                         <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-zinc-900 dark:text-white mb-6">
                             ACME
                             <span class="block text-indigo-600 dark:text-indigo-400">Transportes</span>
                         </h1>

                         <p class="text-lg sm:text-xl text-zinc-600 dark:text-zinc-400 mb-8 max-w-xl mx-auto lg:mx-0">
                             Registro y control de vehículos, conductores y propietarios.
                             Gestiona tu flota de forma profesional y eficiente.
                         </p>

                         <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                             <a
                                 href="{{ route('login') }}"
                                 class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-950"
                             >
                                 Ingresar al sistema
                                 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                 </svg>
                             </a>

                             @if (Route::has('register'))
                             <a
                                 href="{{ route('register') }}"
                                 class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-zinc-300 dark:hover:border-zinc-700 text-zinc-700 dark:text-zinc-300 font-medium rounded-lg transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-950"
                             >
                                 Crear cuenta
                             </a>
                             @endif
                         </div>
                     </div>


                     <div class="relative">
                         <div class="relative bg-white dark:bg-zinc-900 rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-2xl shadow-zinc-200/50 dark:shadow-zinc-950/50 overflow-hidden">

                             <div class="flex items-center gap-2 px-4 py-3 bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-800">
                                 <div class="flex gap-1.5">
                                     <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                     <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                     <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                 </div>
                                 <div class="flex-1 text-center">
                                     <div class="inline-block px-3 py-1 bg-zinc-100 dark:bg-zinc-800 rounded text-xs text-zinc-500 dark:text-zinc-400">
                                         dashboard.acme.com
                                     </div>
                                 </div>
                             </div>


                             <div class="p-6 space-y-4">

                                 <div class="grid grid-cols-3 gap-3">
                                     <div class="bg-zinc-50 dark:bg-zinc-800/50 rounded-lg p-3 text-center">
                                         <div class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">24</div>
                                         <div class="text-xs text-zinc-500 dark:text-zinc-400">Vehículos</div>
                                     </div>
                                     <div class="bg-zinc-50 dark:bg-zinc-800/50 rounded-lg p-3 text-center">
                                         <div class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">18</div>
                                         <div class="text-xs text-zinc-500 dark:text-zinc-400">Conductores</div>
                                     </div>
                                     <div class="bg-zinc-50 dark:bg-zinc-800/50 rounded-lg p-3 text-center">
                                         <div class="text-2xl font-bold text-amber-600 dark:text-amber-400">12</div>
                                         <div class="text-xs text-zinc-500 dark:text-zinc-400">Propietarios</div>
                                     </div>
                                 </div>


                                 <div class="bg-zinc-50 dark:bg-zinc-800/50 rounded-lg overflow-hidden">
                                     <div class="grid grid-cols-4 gap-2 px-3 py-2 text-xs font-medium text-zinc-500 dark:text-zinc-400 border-b border-zinc-200 dark:border-zinc-700">
                                         <div>Placa</div>
                                         <div>Marca</div>
                                         <div>Conductor</div>
                                         <div>Estado</div>
                                     </div>
                                     <div class="grid grid-cols-4 gap-2 px-3 py-2 text-xs text-zinc-700 dark:text-zinc-300">
                                         <div class="font-mono">ABC-123</div>
                                         <div>Toyota</div>
                                         <div>J. García</div>
                                         <div><span class="px-1.5 py-0.5 bg-emerald-100 dark:bg-emerald-900/50 text-emerald-700 dark:text-emerald-400 rounded text-xs">Activo</span></div>
                                     </div>
                                     <div class="grid grid-cols-4 gap-2 px-3 py-2 text-xs text-zinc-700 dark:text-zinc-300 bg-white dark:bg-zinc-900/50">
                                         <div class="font-mono">XYZ-789</div>
                                         <div>Ford</div>
                                         <div>M. López</div>
                                         <div><span class="px-1.5 py-0.5 bg-emerald-100 dark:bg-emerald-900/50 text-emerald-700 dark:text-emerald-400 rounded text-xs">Activo</span></div>
                                     </div>
                                 </div>
                             </div>
                         </div>


                         <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-gradient-to-br from-indigo-500 to-blue-500 rounded-2xl -z-10 opacity-20 blur-xl"></div>
                         <div class="absolute -top-4 -left-4 w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl -z-10 opacity-20 blur-xl"></div>
                     </div>
                 </div>
             </div>
         </section>


         <section class="py-20 lg:py-28 bg-zinc-50 dark:bg-zinc-900/50">
             <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                 <div class="text-center mb-16">
                     <h2 class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mb-4">
                         Todo lo que necesitas para gestionar tu flota
                     </h2>
                     <p class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto">
                         Herramientas profesionales para el control completo de vehículos, conductores y propietarios.
                     </p>
                 </div>

                 <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

                     <div class="group bg-white dark:bg-zinc-900 rounded-2xl p-6 border border-zinc-200 dark:border-zinc-800 hover:border-indigo-200 dark:hover:border-indigo-900 hover:shadow-xl hover:shadow-indigo-500/5 transition-all">
                         <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-950/50 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                             <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                             </svg>
                         </div>
                         <h3 class="text-lg font-semibold text-zinc-900 dark:text-white mb-2">Gestión de Vehículos</h3>
                         <p class="text-zinc-600 dark:text-zinc-400 text-sm">
                             Registra placa, marca, tipo, color y toda la información de cada vehículo de tu flota.
                         </p>
                     </div>


                     <div class="group bg-white dark:bg-zinc-900 rounded-2xl p-6 border border-zinc-200 dark:border-zinc-800 hover:border-emerald-200 dark:hover:border-emerald-900 hover:shadow-xl hover:shadow-emerald-500/5 transition-all">
                         <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-950/50 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                             <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                             </svg>
                         </div>
                         <h3 class="text-lg font-semibold text-zinc-900 dark:text-white mb-2">Gestión de Conductores</h3>
                         <p class="text-zinc-600 dark:text-zinc-400 text-sm">
                             Administra datos completos de licencia, contacto y documentación de cada conductor.
                         </p>
                     </div>


                     <div class="group bg-white dark:bg-zinc-900 rounded-2xl p-6 border border-zinc-200 dark:border-zinc-800 hover:border-amber-200 dark:hover:border-amber-900 hover:shadow-xl hover:shadow-amber-500/5 transition-all">
                         <div class="w-12 h-12 bg-amber-100 dark:bg-amber-950/50 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                             <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                             </svg>
                         </div>
                         <h3 class="text-lg font-semibold text-zinc-900 dark:text-white mb-2">Gestión de Propietarios</h3>
                         <p class="text-zinc-600 dark:text-zinc-400 text-sm">
                             Registra información de empresas o personas propietarias de los vehículos.
                         </p>
                     </div>


                     <div class="group bg-white dark:bg-zinc-900 rounded-2xl p-6 border border-zinc-200 dark:border-zinc-800 hover:border-blue-200 dark:hover:border-blue-900 hover:shadow-xl hover:shadow-blue-500/5 transition-all">
                         <div class="w-12 h-12 bg-blue-100 dark:bg-blue-950/50 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                             <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                             </svg>
                         </div>
                         <h3 class="text-lg font-semibold text-zinc-900 dark:text-white mb-2">Reportes y PDF</h3>
                         <p class="text-zinc-600 dark:text-zinc-400 text-sm">
                             Genera informes detallados y exporta documentación en formato PDF.
                         </p>
                     </div>
                 </div>
             </div>
         </section>


         <section class="py-20 lg:py-28">
             <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                 <div class="text-center mb-16">
                     <h2 class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mb-4">
                         ¿Cómo funciona?
                     </h2>
                     <p class="text-lg text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto">
                         Tres simples pasos para tener tu flota completamente organizada.
                     </p>
                 </div>

                 <div class="grid md:grid-cols-3 gap-8 lg:gap-12">

                     <div class="relative text-center">
                         <div class="inline-flex items-center justify-center w-14 h-14 bg-indigo-600 text-white text-xl font-bold rounded-2xl mb-6 shadow-lg shadow-indigo-500/30">
                             1
                         </div>
                         <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-3">Registrar personas</h3>
                         <p class="text-zinc-600 dark:text-zinc-400">
                             Ingresa los datos de conductores y propietarios con su información de contacto y documentación.
                         </p>

                         <div class="hidden md:block absolute top-7 left-[60%] w-[80%] h-0.5 bg-gradient-to-r from-indigo-300 to-transparent dark:from-indigo-800"></div>
                     </div>


                     <div class="relative text-center">
                         <div class="inline-flex items-center justify-center w-14 h-14 bg-indigo-600 text-white text-xl font-bold rounded-2xl mb-6 shadow-lg shadow-indigo-500/30">
                             2
                         </div>
                         <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-3">Registrar vehículos</h3>
                         <p class="text-zinc-600 dark:text-zinc-400">
                             Añade los vehículos con su placa, marca, tipo y asígnalos a sus conductores y propietarios.
                         </p>

                         <div class="hidden md:block absolute top-7 left-[60%] w-[80%] h-0.5 bg-gradient-to-r from-indigo-300 to-transparent dark:from-indigo-800"></div>
                     </div>


                     <div class="text-center">
                         <div class="inline-flex items-center justify-center w-14 h-14 bg-indigo-600 text-white text-xl font-bold rounded-2xl mb-6 shadow-lg shadow-indigo-500/30">
                             3
                         </div>
                         <h3 class="text-xl font-semibold text-zinc-900 dark:text-white mb-3">Consultar informes</h3>
                         <p class="text-zinc-600 dark:text-zinc-400">
                             Visualiza reportes completos y exporta toda la información en formato PDF.
                         </p>
                     </div>
                 </div>
             </div>
         </section>


         <section class="py-20 lg:py-28 bg-zinc-50 dark:bg-zinc-900/50">
             <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                 <div class="grid lg:grid-cols-2 gap-12 items-center">
                     <div>
                         <h2 class="text-3xl sm:text-4xl font-bold text-zinc-900 dark:text-white mb-4">
                             Reportes claros y profesionales
                         </h2>
                         <p class="text-lg text-zinc-600 dark:text-zinc-400 mb-6">
                             Visualiza toda la información de tu flota en tablas organizadas y exporta reportes PDF listos para imprimir o compartir.
                         </p>
                         <ul class="space-y-3">
                             <li class="flex items-center gap-3 text-zinc-700 dark:text-zinc-300">
                                 <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                 </svg>
                                 Filtros avanzados por fecha, estado y tipo
                             </li>
                             <li class="flex items-center gap-3 text-zinc-700 dark:text-zinc-300">
                                 <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                 </svg>
                                 Exportación a PDF con un clic
                             </li>
                             <li class="flex items-center gap-3 text-zinc-700 dark:text-zinc-300">
                                 <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                 </svg>
                                 Datos siempre actualizados en tiempo real
                             </li>
                         </ul>
                     </div>


                     <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-zinc-200 dark:border-zinc-800 shadow-xl overflow-hidden">
                         <div class="px-6 py-4 border-b border-zinc-200 dark:border-zinc-800 flex items-center justify-between">
                             <h3 class="font-semibold text-zinc-900 dark:text-white">Reporte de Flota</h3>
                             <button class="inline-flex items-center gap-2 px-3 py-1.5 bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 text-sm font-medium rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-950 transition-colors">
                                 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                 </svg>
                                 PDF
                             </button>
                         </div>
                         <div class="overflow-x-auto">
                             <table class="w-full">
                                 <thead class="bg-zinc-50 dark:bg-zinc-800/50">
                                     <tr>
                                         <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Placa</th>
                                         <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Marca</th>
                                         <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Conductor</th>
                                         <th class="px-6 py-3 text-left text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Propietario</th>
                                     </tr>
                                 </thead>
                                 <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800">
                                     <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                                         <td class="px-6 py-4 text-sm font-mono font-medium text-zinc-900 dark:text-white">ABC-123</td>
                                         <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">Toyota Hilux</td>
                                         <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">Juan García Pérez</td>
                                         <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">Transportes XYZ S.A.</td>
                                     </tr>
                                     <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                                         <td class="px-6 py-4 text-sm font-mono font-medium text-zinc-900 dark:text-white">XYZ-789</td>
                                         <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">Ford Ranger</td>
                                         <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">María López Ruiz</td>
                                         <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">Logística Norte Ltda.</td>
                                     </tr>
                                     <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                                         <td class="px-6 py-4 text-sm font-mono font-medium text-zinc-900 dark:text-white">DEF-456</td>
                                         <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">Chevrolet D-Max</td>
                                         <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">Carlos Mendoza S.</td>
                                         <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-400">Transportes XYZ S.A.</td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </section>


         <section class="py-20 lg:py-28">
             <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                 <div class="bg-gradient-to-br from-indigo-600 to-blue-600 rounded-3xl p-10 lg:p-16 shadow-2xl shadow-indigo-500/20 relative overflow-hidden">

                     <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                     <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

                     <div class="relative">
                         <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                             Comienza a gestionar tu flota hoy
                         </h2>
                         <p class="text-lg text-indigo-100 mb-8 max-w-xl mx-auto">
                             Únete a empresas que ya optimizan su gestión vehicular con ACME Transportes.
                         </p>
                         <div class="flex flex-col sm:flex-row gap-4 justify-center">
                             <a
                                 href="{{ route('login') }}"
                                 class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-indigo-600 font-semibold rounded-xl shadow-lg hover:shadow-xl hover:bg-indigo-50 transition-all focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600"
                             >
                                 Ingresar ahora
                                 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                 </svg>
                             </a>
                             @if (Route::has('register'))
                             <a
                                 href="{{ route('register') }}"
                                 class="inline-flex items-center justify-center px-8 py-3.5 bg-transparent border-2 border-white/30 text-white font-semibold rounded-xl hover:bg-white/10 hover:border-white/50 transition-all focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600"
                             >
                                 Crear cuenta gratis
                             </a>
                             @endif
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </main>


     <footer class="border-t border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-950">
         <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
             <div class="flex flex-col md:flex-row items-center justify-between gap-6">

                 <div class="flex items-center gap-3">
                     <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center">
                         <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                         </svg>
                     </div>
                     <span class="text-sm text-zinc-600 dark:text-zinc-400">
                         © {{ date('Y') }} ACME Transportes. Todos los derechos reservados.
                     </span>
                 </div>


                 <nav class="flex items-center gap-6">
                     @auth
                         <a href="{{ url('/dashboard') }}" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                             Dashboard
                         </a>
                     @else
                         <a href="{{ route('login') }}" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                             Iniciar sesión
                         </a>
                         @if (Route::has('register'))
                             <a href="{{ route('register') }}" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                 Registrarse
                             </a>
                         @endif
                     @endauth
                 </nav>
             </div>
         </div>

         
         @if (Route::has('login'))
             <div class="h-14.5 hidden lg:block"></div>
         @endif
     </footer>

 </body>
 </html>
