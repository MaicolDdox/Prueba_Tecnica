<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;

class VehicleReportController extends Controller
{
    public function index(): View
    {
        $vehicles = Vehicle::with(['driver', 'owner'])
            ->orderBy('plate')
            ->get();

        return view('admin.reports.vehicles.index', [
            'vehicles' => $vehicles,
        ]);
    }

    public function pdf()
    {
        $vehicles = Vehicle::with(['driver', 'owner'])
            ->orderBy('plate')
            ->get();

        $generatedAt = now();

        $pdf = Pdf::loadView('admin.reports.vehicles_pdf', [
            'vehicles' => $vehicles,
            'generatedAt' => $generatedAt,
        ])->setPaper('a4', 'portrait');

        return $pdf->download('informe_vehiculos.pdf');
    }
}
