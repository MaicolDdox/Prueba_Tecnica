@php($person = $person ?? null)

<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="text-sm font-medium text-gray-700" for="document_number">Numero de cedula</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="document_number" name="document_number" type="text"
               value="{{ old('document_number', $person?->document_number) }}" required>
        @error('document_number')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="first_name">Primer nombre</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="first_name" name="first_name" type="text"
               value="{{ old('first_name', $person?->first_name) }}" required>
        @error('first_name')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="middle_name">Segundo nombre</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="middle_name" name="middle_name" type="text"
               value="{{ old('middle_name', $person?->middle_name) }}">
        @error('middle_name')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="last_name">Apellidos</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="last_name" name="last_name" type="text"
               value="{{ old('last_name', $person?->last_name) }}" required>
        @error('last_name')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label class="text-sm font-medium text-gray-700" for="address">Direccion</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="address" name="address" type="text"
               value="{{ old('address', $person?->address) }}">
        @error('address')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="phone">Telefono</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="phone" name="phone" type="text"
               value="{{ old('phone', $person?->phone) }}">
        @error('phone')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700" for="city">Ciudad</label>
        <input class="mt-1 w-full rounded-lg border border-gray-200 px-3 py-2 text-sm focus:border-gray-900 focus:ring-0"
               id="city" name="city" type="text"
               value="{{ old('city', $person?->city) }}">
        @error('city')
            <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
        @enderror
    </div>
</div>
