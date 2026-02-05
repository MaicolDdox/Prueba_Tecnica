@extends('layouts.dashboard')

@section('title', 'Informe de vehiculos')
@section('page-title', 'Informe de vehiculos')
@section('kicker', 'Reportes')

@section('page-actions')
    <a href="{{ route('admin.reports.vehicles.pdf') }}"
       class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-gray-800">
        Exportar a PDF
    </a>
@endsection

@section('content')
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <table id="vehicles-report-table" class="min-w-full text-sm">
            <thead class="text-left text-gray-500">
                <tr>
                    <th class="py-3 pr-4">Placa</th>
                    <th class="py-3 pr-4">Marca</th>
                    <th class="py-3 pr-4">Conductor</th>
                    <th class="py-3 pr-4">Propietario</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($vehicles as $vehicle)
                    <tr class="border-t border-gray-100">
                        <td class="py-3 pr-4">{{ $vehicle->plate }}</td>
                        <td class="py-3 pr-4">{{ $vehicle->brand }}</td>
                        <td class="py-3 pr-4">{{ $vehicle->driver?->full_name ?? '-' }}</td>
                        <td class="py-3 pr-4">{{ $vehicle->owner?->full_name ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#vehicles-report-table').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                pageLength: 10,
                order: [[0, 'asc']]
            });
        });
    </script>
@endpush
