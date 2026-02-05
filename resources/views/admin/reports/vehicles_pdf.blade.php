<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Transportes ACME S.A. - Informe de Vehiculos</title>
        <style>
            body {
                font-family: DejaVu Sans, sans-serif;
                font-size: 12px;
                color: #1f2937;
                margin: 24px;
            }
            .header {
                text-align: center;
                margin-bottom: 24px;
            }
            .header h1 {
                font-size: 18px;
                margin: 0 0 6px 0;
            }
            .header p {
                font-size: 12px;
                margin: 0;
                color: #6b7280;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #e5e7eb;
                padding: 8px 10px;
                text-align: left;
            }
            th {
                background: #f9fafb;
                font-weight: 600;
            }
            .footer {
                margin-top: 24px;
                text-align: right;
                font-size: 10px;
                color: #9ca3af;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Transportes ACME S.A. - Informe de Vehiculos</h1>
            <p>Fecha de generacion: {{ $generatedAt->format('d/m/Y H:i') }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Conductor</th>
                    <th>Propietario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->plate }}</td>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->driver?->full_name ?? '-' }}</td>
                        <td>{{ $vehicle->owner?->full_name ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            Documento generado automaticamente.
        </div>
    </body>
</html>
