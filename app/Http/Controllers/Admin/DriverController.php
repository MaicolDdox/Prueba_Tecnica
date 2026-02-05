<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDriverRequest;
use App\Http\Requests\Admin\UpdateDriverRequest;
use App\Models\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DriverController extends Controller
{
    public function index(): View
    {
        $drivers = Person::drivers()
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->get();

        return view('admin.drivers.index', [
            'drivers' => $drivers,
        ]);
    }

    public function create(): View
    {
        return view('admin.drivers.create');
    }

    public function store(StoreDriverRequest $request): RedirectResponse
    {
        Person::create(array_merge($request->validated(), [
            'type' => Person::TYPE_DRIVER,
        ]));

        return redirect()
            ->route('admin.drivers.index')
            ->with('success', 'Conductor registrado correctamente.');
    }

    public function edit(Person $driver): View
    {
        $this->ensureDriver($driver);

        return view('admin.drivers.edit', [
            'driver' => $driver,
        ]);
    }

    public function update(UpdateDriverRequest $request, Person $driver): RedirectResponse
    {
        $this->ensureDriver($driver);

        $driver->update(array_merge($request->validated(), [
            'type' => Person::TYPE_DRIVER,
        ]));

        return redirect()
            ->route('admin.drivers.index')
            ->with('success', 'Conductor actualizado correctamente.');
    }

    public function destroy(Person $driver): RedirectResponse
    {
        $this->ensureDriver($driver);

        try {
            $driver->delete();
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.drivers.index')
                ->with('error', 'No se pudo eliminar el conductor. Verifica dependencias asociadas.');
        }

        return redirect()
            ->route('admin.drivers.index')
            ->with('success', 'Conductor eliminado correctamente.');
    }

    private function ensureDriver(Person $driver): void
    {
        if ($driver->type !== Person::TYPE_DRIVER) {
            abort(404);
        }
    }
}
