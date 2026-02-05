<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VehicleStoreRequest;
use App\Http\Requests\Admin\VehicleUpdateRequest;
use App\Models\Person;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function index(): View
    {
        $vehicles = Vehicle::with(['driver', 'owner'])
            ->orderBy('plate')
            ->get();

        return view('admin.vehicles.index', [
            'vehicles' => $vehicles,
        ]);
    }

    public function create(): View
    {
        $drivers = Person::drivers()->orderBy('first_name')->get();
        $owners = Person::owners()->orderBy('first_name')->get();

        return view('admin.vehicles.create', [
            'drivers' => $drivers,
            'owners' => $owners,
        ]);
    }

    public function store(VehicleStoreRequest $request): RedirectResponse
    {
        Vehicle::create($request->validated());

        return redirect()
            ->route('admin.vehicles.index')
            ->with('success', 'Vehiculo registrado correctamente.');
    }

    public function edit(Vehicle $vehicle): View
    {
        $drivers = Person::drivers()->orderBy('first_name')->get();
        $owners = Person::owners()->orderBy('first_name')->get();

        return view('admin.vehicles.edit', [
            'vehicle' => $vehicle,
            'drivers' => $drivers,
            'owners' => $owners,
        ]);
    }

    public function update(VehicleUpdateRequest $request, Vehicle $vehicle): RedirectResponse
    {
        $vehicle->update($request->validated());

        return redirect()
            ->route('admin.vehicles.index')
            ->with('success', 'Vehiculo actualizado correctamente.');
    }

    public function destroy(Vehicle $vehicle): RedirectResponse
    {
        try {
            $vehicle->delete();
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.vehicles.index')
                ->with('error', 'No se pudo eliminar el vehiculo. Verifica dependencias asociadas.');
        }

        return redirect()
            ->route('admin.vehicles.index')
            ->with('success', 'Vehiculo eliminado correctamente.');
    }
}
