<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Panel Administrativo') - Transportes ACME S.A.</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
        <style>
            :root {
                --surface: #ffffff;
                --ink: #0f172a;
                --muted: #6b7280;
                --border: #e5e7eb;
                --accent: #111827;
                --wash: #f8fafc;
            }
            body {
                font-family: 'Manrope', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif;
                background: linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
            }
            .page-fade {
                animation: fadeIn 0.45s ease-out both;
            }
            .stagger > * {
                animation: rise 0.5s ease-out both;
            }
            .stagger > *:nth-child(1) { animation-delay: 0.05s; }
            .stagger > *:nth-child(2) { animation-delay: 0.12s; }
            .stagger > *:nth-child(3) { animation-delay: 0.18s; }
            .stagger > *:nth-child(4) { animation-delay: 0.24s; }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(6px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @keyframes rise {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .dt-container .dt-length select,
            .dt-container .dt-search input {
                border-radius: 0.5rem;
                border-color: #e5e7eb;
            }
            .dt-container .dt-paging .dt-paging-button {
                border-radius: 0.5rem;
                border: 1px solid transparent;
            }
        </style>
        @stack('styles')
    </head>
    <body class="text-gray-900 antialiased">
        <div class="min-h-screen flex">
            <aside class="w-64 bg-white border-r border-gray-200 hidden lg:flex lg:flex-col">
                <div class="px-6 py-6 border-b border-gray-200">
                    <p class="text-xs uppercase tracking-[0.2em] text-gray-400">Transportes</p>
                    <h1 class="text-lg font-semibold text-gray-900">ACME S.A.</h1>
                </div>
                <nav class="flex-1 px-4 py-6 space-y-2">
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M3 11.5 12 4l9 7.5v7a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.drivers.index') }}"
                       class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition {{ request()->routeIs('admin.drivers.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
                            <path d="M4 20a8 8 0 0 1 16 0"/>
                        </svg>
                        Conductores
                    </a>
                    <a href="{{ route('admin.owners.index') }}"
                       class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition {{ request()->routeIs('admin.owners.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M8 7a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                            <path d="M2 20a10 10 0 0 1 20 0"/>
                        </svg>
                        Propietarios
                    </a>
                    <a href="{{ route('admin.vehicles.index') }}"
                       class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition {{ request()->routeIs('admin.vehicles.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M4 14 6 7h12l2 7"/>
                            <path d="M3 14h18v4a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-1H7v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"/>
                        </svg>
                        Vehiculos
                    </a>
                    <a href="{{ route('admin.reports.vehicles.index') }}"
                       class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition {{ request()->routeIs('admin.reports.vehicles.*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M6 3h8l4 4v14a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"/>
                            <path d="M14 3v5h5"/>
                            <path d="M8 13h8M8 17h8M8 9h4"/>
                        </svg>
                        Informe
                    </a>
                </nav>
                <div class="px-6 py-6 border-t border-gray-200">
                    <p class="text-xs text-gray-400">Panel administrativo</p>
                </div>
            </aside>

            <div class="flex-1 flex flex-col">
                <header class="bg-white border-b border-gray-200">
                    <div class="px-6 py-4 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-[0.2em] text-gray-400">@yield('kicker', 'Administracion')</p>
                            <h2 class="text-2xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h2>
                        </div>
                        <div class="flex items-center gap-3">
                            @yield('page-actions')
                            <div class="hidden sm:flex items-center gap-3 rounded-full border border-gray-200 px-4 py-2 text-sm text-gray-600">
                                <span>{{ auth()->user()->name ?? 'Usuario' }}</span>
                                <span class="h-1 w-1 rounded-full bg-gray-300"></span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="text-gray-700 hover:text-gray-900" type="submit">Salir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 pb-4 lg:hidden">
                        <div class="flex gap-2 overflow-x-auto pb-2 text-sm">
                            <a href="{{ route('dashboard') }}"
                               class="whitespace-nowrap rounded-full border border-gray-200 px-4 py-2 {{ request()->routeIs('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-600' }}">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.drivers.index') }}"
                               class="whitespace-nowrap rounded-full border border-gray-200 px-4 py-2 {{ request()->routeIs('admin.drivers.*') ? 'bg-gray-900 text-white' : 'text-gray-600' }}">
                                Conductores
                            </a>
                            <a href="{{ route('admin.owners.index') }}"
                               class="whitespace-nowrap rounded-full border border-gray-200 px-4 py-2 {{ request()->routeIs('admin.owners.*') ? 'bg-gray-900 text-white' : 'text-gray-600' }}">
                                Propietarios
                            </a>
                            <a href="{{ route('admin.vehicles.index') }}"
                               class="whitespace-nowrap rounded-full border border-gray-200 px-4 py-2 {{ request()->routeIs('admin.vehicles.*') ? 'bg-gray-900 text-white' : 'text-gray-600' }}">
                                Vehiculos
                            </a>
                            <a href="{{ route('admin.reports.vehicles.index') }}"
                               class="whitespace-nowrap rounded-full border border-gray-200 px-4 py-2 {{ request()->routeIs('admin.reports.vehicles.*') ? 'bg-gray-900 text-white' : 'text-gray-600' }}">
                                Informe
                            </a>
                        </div>
                    </div>
                </header>

                <main class="flex-1 px-6 py-6 page-fade">
                    @if (session('success'))
                        <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                            {{ session('error') }}
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
        @stack('scripts')
    </body>
</html>
