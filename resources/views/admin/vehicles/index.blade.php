@extends('layouts.dashboard')

@section('title', 'Vehiculos')
@section('page-title', 'Vehiculos')

@section('page-actions')
    <a href="{{ route('admin.vehicles.create') }}"
       class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-gray-800">
        Nuevo vehiculo
    </a>
@endsection

@section('content')
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <table id="vehicles-table" class="min-w-full text-sm">
            <thead class="text-left text-gray-500">
                <tr>
                    <th class="py-3 pr-4">Placa</th>
                    <th class="py-3 pr-4">Marca</th>
                    <th class="py-3 pr-4">Tipo</th>
                    <th class="py-3 pr-4">Conductor</th>
                    <th class="py-3 pr-4">Propietario</th>
                    <th class="py-3 pr-4">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($vehicles as $vehicle)
                    <tr class="border-t border-gray-100">
                        <td class="py-3 pr-4">{{ $vehicle->plate }}</td>
                        <td class="py-3 pr-4">{{ $vehicle->brand }}</td>
                        <td class="py-3 pr-4">{{ ucfirst($vehicle->vehicle_type) }}</td>
                        <td class="py-3 pr-4">{{ $vehicle->driver?->full_name ?? '-' }}</td>
                        <td class="py-3 pr-4">{{ $vehicle->owner?->full_name ?? '-' }}</td>
                        <td class="py-3 pr-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.vehicles.edit', $vehicle) }}"
                                   class="rounded-lg border border-gray-200 px-3 py-1 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                                    Editar
                                </a>
                                <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle) }}"
                                      onsubmit="return confirm('Deseas eliminar este vehiculo?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-lg border border-rose-200 px-3 py-1 text-xs font-semibold text-rose-600 hover:bg-rose-50" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#vehicles-table').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                pageLength: 10,
                order: [[0, 'asc']]
            });
        });
    </script>
@endpush
