@php($vehicle = $vehicle ?? null)

<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="text-sm font-medium text-gray-700" for="plate">Placa</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="plate" name="plate" type="text"
               value="{{ old('plate', $vehicle?->plate) }}" required>
        @error('plate')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="brand">Marca</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="brand" name="brand" type="text"
               value="{{ old('brand', $vehicle?->brand) }}" required>
        @error('brand')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="color">Color</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="color" name="color" type="text"
               value="{{ old('color', $vehicle?->color) }}" required>
        @error('color')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="vehicle_type">Tipo de vehiculo</label>
        <select class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
                id="vehicle_type" name="vehicle_type" required>
            @php($selectedType = old('vehicle_type', $vehicle?->vehicle_type))
            <option value="">Selecciona una opcion</option>
            <option value="particular" @selected($selectedType === 'particular')>Particular</option>
            <option value="publico" @selected($selectedType === 'publico')>Publico</option>
        </select>
        @error('vehicle_type')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="driver_id">Conductor</label>
        <select class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
                id="driver_id" name="driver_id" required>
            <option value="">Selecciona un conductor</option>
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" @selected(old('driver_id', $vehicle?->driver_id) == $driver->id)>
                    {{ $driver->full_name }} - {{ $driver->document_number }}
                </option>
            @endforeach
        </select>
        @error('driver_id')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="owner_id">Propietario</label>
        <select class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
                id="owner_id" name="owner_id" required>
            <option value="">Selecciona un propietario</option>
            @foreach ($owners as $owner)
                <option value="{{ $owner->id }}" @selected(old('owner_id', $vehicle?->owner_id) == $owner->id)>
                    {{ $owner->full_name }} - {{ $owner->document_number }}
                </option>
            @endforeach
        </select>
        @error('owner_id')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>
</div>
