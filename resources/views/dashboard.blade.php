@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Panel Administrativo')
@section('kicker', 'Transportes ACME S.A.')

@section('content')
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4 stagger">
        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Conductores</p>
                    <p class="mt-2 text-2xl font-semibold text-gray-900">{{ number_format($drivers_count) }}</p>
                </div>
                <span class="rounded-full bg-gray-100 p-3 text-gray-700">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
                        <path d="M4 20a8 8 0 0 1 16 0"/>
                    </svg>
                </span>
            </div>
            <p class="mt-3 text-xs text-gray-500">Personas registradas como conductores.</p>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Propietarios</p>
                    <p class="mt-2 text-2xl font-semibold text-gray-900">{{ number_format($owners_count) }}</p>
                </div>
                <span class="rounded-full bg-gray-100 p-3 text-gray-700">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M8 7a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                        <path d="M2 20a10 10 0 0 1 20 0"/>
                    </svg>
                </span>
            </div>
            <p class="mt-3 text-xs text-gray-500">Personas registradas como propietarios.</p>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Vehiculos</p>
                    <p class="mt-2 text-2xl font-semibold text-gray-900">{{ number_format($vehicles_count) }}</p>
                </div>
                <span class="rounded-full bg-gray-100 p-3 text-gray-700">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M4 14 6 7h12l2 7"/>
                        <path d="M3 14h18v4a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-1H7v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"/>
                    </svg>
                </span>
            </div>
            <p class="mt-3 text-xs text-gray-500">Vehiculos activos en el sistema.</p>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-gray-500">Vehiculos por tipo</p>
            <div class="mt-3 grid grid-cols-2 gap-3">
                <div class="rounded-xl border border-gray-100 bg-gray-50 p-3">
                    <p class="text-xs text-gray-500">Particular</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ number_format($vehicles_by_type['particular']) }}</p>
                </div>
                <div class="rounded-xl border border-gray-100 bg-gray-50 p-3">
                    <p class="text-xs text-gray-500">Publico</p>
                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ number_format($vehicles_by_type['publico']) }}</p>
                </div>
            </div>
            <p class="mt-3 text-xs text-gray-500">Distribucion general por categoria.</p>
        </div>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-3 stagger">
        <a href="{{ route('admin.drivers.index') }}" class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Modulo</p>
                    <h3 class="text-lg font-semibold text-gray-900">Conductores</h3>
                </div>
                <span class="rounded-full bg-gray-100 p-3 text-gray-700">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
                        <path d="M4 20a8 8 0 0 1 16 0"/>
                    </svg>
                </span>
            </div>
            <p class="mt-4 text-sm text-gray-600">Gestiona la informacion de conductores asignados.</p>
        </a>

        <a href="{{ route('admin.owners.index') }}" class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Modulo</p>
                    <h3 class="text-lg font-semibold text-gray-900">Propietarios</h3>
                </div>
                <span class="rounded-full bg-gray-100 p-3 text-gray-700">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M8 7a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                        <path d="M2 20a10 10 0 0 1 20 0"/>
                    </svg>
                </span>
            </div>
            <p class="mt-4 text-sm text-gray-600">Administra los propietarios registrados.</p>
        </a>

        <a href="{{ route('admin.vehicles.index') }}" class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Modulo</p>
                    <h3 class="text-lg font-semibold text-gray-900">Vehiculos</h3>
                </div>
                <span class="rounded-full bg-gray-100 p-3 text-gray-700">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M4 14 6 7h12l2 7"/>
                        <path d="M3 14h18v4a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-1H7v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"/>
                    </svg>
                </span>
            </div>
            <p class="mt-4 text-sm text-gray-600">Registra y asigna vehiculos a conductores y propietarios.</p>
        </a>
    </div>

    <div class="mt-8 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <h4 class="text-lg font-semibold text-gray-900">Informe de Vehiculos</h4>
                <p class="text-sm text-gray-600">Consulta el listado general y exporta a PDF.</p>
            </div>
            <a href="{{ route('admin.reports.vehicles.index') }}"
               class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-gray-800">
                Ver informe
            </a>
        </div>
    </div>

    <section class="mt-10 space-y-6">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h4 class="text-lg font-semibold text-gray-900">Analitica</h4>
                <p class="text-sm text-gray-600">Vista general de los movimientos recientes.</p>
            </div>
            <p class="text-xs text-gray-500">Ultima actualizacion: {{ $last_updated }}</p>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div>
                    <h5 class="text-sm font-semibold text-gray-900">Registros de vehiculos (ultimos {{ $range_days }} dias)</h5>
                    <p class="text-xs text-gray-500">Conteo diario de nuevos vehiculos creados.</p>
                </div>
                <div id="vehiclesTrendChart" class="mt-4 h-72">
                    @unless($has_vehicles_trend)
                        <div class="flex h-full items-center justify-center rounded-lg border border-dashed border-gray-200 bg-gray-50">
                            <div class="text-center text-sm text-gray-500">
                                <p class="font-semibold text-gray-700">Aun no hay registros</p>
                                <p class="text-xs text-gray-500">Registra vehiculos para ver la tendencia.</p>
                            </div>
                        </div>
                    @endunless
                </div>
            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div>
                    <h5 class="text-sm font-semibold text-gray-900">Vehiculos por tipo</h5>
                    <p class="text-xs text-gray-500">Comparativo entre particular y publico.</p>
                </div>
                <div id="vehiclesTypeChart" class="mt-4 h-72">
                    @unless($has_vehicles_by_type)
                        <div class="flex h-full items-center justify-center rounded-lg border border-dashed border-gray-200 bg-gray-50">
                            <div class="text-center text-sm text-gray-500">
                                <p class="font-semibold text-gray-700">Aun no hay registros</p>
                                <p class="text-xs text-gray-500">Agrega vehiculos para ver la distribucion.</p>
                            </div>
                        </div>
                    @endunless
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <div>
                <h5 class="text-sm font-semibold text-gray-900">Top 5 marcas por cantidad de vehiculos</h5>
                <p class="text-xs text-gray-500">Marcas con mayor presencia en el sistema.</p>
            </div>
            <div id="topBrandsChart" class="mt-4 h-80">
                @unless($has_top_brands)
                    <div class="flex h-full items-center justify-center rounded-lg border border-dashed border-gray-200 bg-gray-50">
                        <div class="text-center text-sm text-gray-500">
                            <p class="font-semibold text-gray-700">Aun no hay registros</p>
                            <p class="text-xs text-gray-500">Crea vehiculos para ver el ranking de marcas.</p>
                        </div>
                    </div>
                @endunless
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hasVehiclesTrend = @json($has_vehicles_trend);
            const hasVehiclesByType = @json($has_vehicles_by_type);
            const hasTopBrands = @json($has_top_brands);

            const trendLabels = @json($series_line['labels']);
            const trendData = @json($series_line['data']);
            const typeLabels = @json(['Particular', 'Publico']);
            const typeData = @json([$vehicles_by_type['particular'], $vehicles_by_type['publico']]);
            const brandLabels = @json($top_brands['labels']);
            const brandData = @json($top_brands['data']);

            const palette = {
                primary: '#7BA7D7',
                secondary: '#A7C7E7',
                accent: '#F2B8C6',
                accentLight: '#F8D9E2',
                slate: '#94A3B8',
            };

            const baseChart = {
                chart: {
                    fontFamily: 'Manrope, ui-sans-serif, system-ui, -apple-system, Segoe UI, sans-serif',
                    toolbar: { show: false },
                    animations: { enabled: true, easing: 'easeinout', speed: 700 },
                },
                dataLabels: { enabled: false },
                grid: { borderColor: '#e5e7eb', strokeDashArray: 4 },
                tooltip: { theme: 'light' },
            };

            if (hasVehiclesTrend && document.querySelector('#vehiclesTrendChart')) {
                const options = {
                    ...baseChart,
                    chart: { ...baseChart.chart, type: 'area', height: 280 },
                    series: [{ name: 'Vehiculos', data: trendData }],
                    xaxis: {
                        categories: trendLabels,
                        labels: { style: { colors: '#6b7280' } },
                        axisBorder: { color: '#e5e7eb' },
                        axisTicks: { color: '#e5e7eb' },
                    },
                    yaxis: {
                        min: 0,
                        labels: { style: { colors: '#6b7280' } },
                    },
                    colors: [palette.primary],
                    stroke: { curve: 'smooth', width: 2 },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 0.4,
                            opacityFrom: 0.35,
                            opacityTo: 0.08,
                            stops: [0, 90, 100],
                        },
                    },
                };

                new ApexCharts(document.querySelector('#vehiclesTrendChart'), options).render();
            }

            if (hasVehiclesByType && document.querySelector('#vehiclesTypeChart')) {
                const options = {
                    ...baseChart,
                    chart: { ...baseChart.chart, type: 'donut', height: 280 },
                    series: typeData,
                    labels: typeLabels,
                    colors: [palette.accent, palette.secondary],
                    legend: {
                        position: 'bottom',
                        fontSize: '12px',
                        labels: { colors: '#6b7280' },
                    },
                    plotOptions: {
                        pie: {
                            donut: { size: '65%' },
                        },
                    },
                    stroke: { width: 0 },
                };

                new ApexCharts(document.querySelector('#vehiclesTypeChart'), options).render();
            }

            if (hasTopBrands && document.querySelector('#topBrandsChart')) {
                const options = {
                    ...baseChart,
                    chart: { ...baseChart.chart, type: 'bar', height: 320 },
                    series: [{ name: 'Vehiculos', data: brandData }],
                    xaxis: {
                        categories: brandLabels,
                        labels: { style: { colors: '#6b7280' } },
                        axisBorder: { color: '#e5e7eb' },
                        axisTicks: { color: '#e5e7eb' },
                    },
                    yaxis: {
                        min: 0,
                        labels: { style: { colors: '#6b7280' } },
                    },
                    colors: [palette.secondary],
                    plotOptions: {
                        bar: {
                            borderRadius: 6,
                            columnWidth: '45%',
                        },
                    },
                };

                new ApexCharts(document.querySelector('#topBrandsChart'), options).render();
            }
        });
    </script>
@endpush
