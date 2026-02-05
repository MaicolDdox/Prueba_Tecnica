@extends('layouts.dashboard')

@section('title', 'Nuevo vehiculo')
@section('page-title', 'Registrar vehiculo')

@section('content')
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('admin.vehicles.store') }}">
            @csrf
            @if ($errors->any())
                <div class="mb-4 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                    Revisa los campos marcados.
                </div>
            @endif

            @include('admin.vehicles._form', ['drivers' => $drivers, 'owners' => $owners])

            <div class="mt-6 flex items-center gap-3">
                <button class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800" type="submit">
                    Guardar vehiculo
                </button>
                <a class="text-sm font-semibold text-gray-600 hover:text-gray-900" href="{{ route('admin.vehicles.index') }}">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
