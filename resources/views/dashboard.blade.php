@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Panel Administrativo')
@section('kicker', 'Transportes ACME S.A.')

@section('content')
    <div class="grid gap-6 lg:grid-cols-3 stagger">
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
@endsection
