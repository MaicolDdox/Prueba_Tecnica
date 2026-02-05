<?php

namespace App\Http\Requests\Admin;

use App\Models\Person;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'plate' => [
                'required',
                'string',
                'max:20',
                Rule::unique('vehicles', 'plate')->ignore($this->route('vehicle')),
            ],
            'color' => ['required', 'string', 'max:30'],
            'brand' => ['required', 'string', 'max:50'],
            'vehicle_type' => ['required', 'in:particular,publico'],
            'owner_id' => [
                'required',
                'integer',
                Rule::exists('people', 'id')->where('type', Person::TYPE_OWNER),
            ],
            'driver_id' => [
                'required',
                'integer',
                Rule::exists('people', 'id')->where('type', Person::TYPE_DRIVER),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'plate.required' => 'La placa es obligatoria.',
            'plate.unique' => 'La placa ya esta registrada.',
            'plate.max' => 'La placa no debe exceder :max caracteres.',
            'color.required' => 'El color es obligatorio.',
            'color.max' => 'El color no debe exceder :max caracteres.',
            'brand.required' => 'La marca es obligatoria.',
            'brand.max' => 'La marca no debe exceder :max caracteres.',
            'vehicle_type.required' => 'El tipo de vehiculo es obligatorio.',
            'vehicle_type.in' => 'El tipo de vehiculo debe ser particular o publico.',
            'owner_id.required' => 'El propietario es obligatorio.',
            'owner_id.exists' => 'El propietario seleccionado no es valido.',
            'driver_id.required' => 'El conductor es obligatorio.',
            'driver_id.exists' => 'El conductor seleccionado no es valido.',
        ];
    }

    public function attributes(): array
    {
        return [
            'plate' => 'placa',
            'color' => 'color',
            'brand' => 'marca',
            'vehicle_type' => 'tipo de vehiculo',
            'owner_id' => 'propietario',
            'driver_id' => 'conductor',
        ];
    }
}
