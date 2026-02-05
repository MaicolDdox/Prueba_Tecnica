<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOwnerRequest;
use App\Http\Requests\Admin\UpdateOwnerRequest;
use App\Models\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OwnerController extends Controller
{
    public function index(): View
    {
        $owners = Person::owners()
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->get();

        return view('admin.owners.index', [
            'owners' => $owners,
        ]);
    }

    public function create(): View
    {
        return view('admin.owners.create');
    }

    public function store(StoreOwnerRequest $request): RedirectResponse
    {
        Person::create(array_merge($request->validated(), [
            'type' => Person::TYPE_OWNER,
        ]));

        return redirect()
            ->route('admin.owners.index')
            ->with('success', 'Propietario registrado correctamente.');
    }

    public function edit(Person $owner): View
    {
        $this->ensureOwner($owner);

        return view('admin.owners.edit', [
            'owner' => $owner,
        ]);
    }

    public function update(UpdateOwnerRequest $request, Person $owner): RedirectResponse
    {
        $this->ensureOwner($owner);

        $owner->update(array_merge($request->validated(), [
            'type' => Person::TYPE_OWNER,
        ]));

        return redirect()
            ->route('admin.owners.index')
            ->with('success', 'Propietario actualizado correctamente.');
    }

    public function destroy(Person $owner): RedirectResponse
    {
        $this->ensureOwner($owner);

        try {
            $owner->delete();
        } catch (\Throwable $exception) {
            return redirect()
                ->route('admin.owners.index')
                ->with('error', 'No se pudo eliminar el propietario. Verifica dependencias asociadas.');
        }

        return redirect()
            ->route('admin.owners.index')
            ->with('success', 'Propietario eliminado correctamente.');
    }

    private function ensureOwner(Person $owner): void
    {
        if ($owner->type !== Person::TYPE_OWNER) {
            abort(404);
        }
    }
}
