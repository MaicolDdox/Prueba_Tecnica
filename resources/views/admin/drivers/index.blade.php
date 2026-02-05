@extends('layouts.dashboard')

@section('title', 'Conductores')
@section('page-title', 'Conductores')

@section('page-actions')
    <a href="{{ route('admin.drivers.create') }}"
       class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-gray-800">
        Nuevo conductor
    </a>
@endsection

@section('content')
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <table id="drivers-table" class="min-w-full text-sm">
            <thead class="text-left text-gray-500">
                <tr>
                    <th class="py-3 pr-4">Cedula</th>
                    <th class="py-3 pr-4">Nombre completo</th>
                    <th class="py-3 pr-4">Telefono</th>
                    <th class="py-3 pr-4">Ciudad</th>
                    <th class="py-3 pr-4">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($drivers as $driver)
                    <tr class="border-t border-gray-100">
                        <td class="py-3 pr-4">{{ $driver->document_number }}</td>
                        <td class="py-3 pr-4">{{ $driver->full_name }}</td>
                        <td class="py-3 pr-4">{{ $driver->phone ?? '-' }}</td>
                        <td class="py-3 pr-4">{{ $driver->city ?? '-' }}</td>
                        <td class="py-3 pr-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.drivers.edit', $driver) }}"
                                   class="rounded-lg border border-gray-200 px-3 py-1 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                                    Editar
                                </a>
                                <form method="POST" action="{{ route('admin.drivers.destroy', $driver) }}"
                                      onsubmit="return confirm('Deseas eliminar este conductor?')">
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
            $('#drivers-table').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                pageLength: 10,
                order: [[1, 'asc']]
            });
        });
    </script>
@endpush
