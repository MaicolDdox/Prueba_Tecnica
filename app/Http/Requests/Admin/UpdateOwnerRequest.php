<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOwnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'document_number' => [
                'required',
                'string',
                'max:20',
                Rule::unique('people', 'document_number')->ignore($this->route('owner')),
            ],
            'first_name' => ['required', 'string', 'max:60'],
            'middle_name' => ['nullable', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:80'],
            'address' => ['nullable', 'string', 'max:120'],
            'phone' => ['nullable', 'string', 'max:20'],
            'city' => ['nullable', 'string', 'max:60'],
        ];
    }

    public function messages(): array
    {
        return [
            'document_number.required' => 'El numero de cedula es obligatorio.',
            'document_number.unique' => 'El numero de cedula ya esta registrado.',
            'document_number.max' => 'El numero de cedula no debe exceder :max caracteres.',
            'first_name.required' => 'El primer nombre es obligatorio.',
            'first_name.max' => 'El primer nombre no debe exceder :max caracteres.',
            'middle_name.max' => 'El segundo nombre no debe exceder :max caracteres.',
            'last_name.required' => 'Los apellidos son obligatorios.',
            'last_name.max' => 'Los apellidos no deben exceder :max caracteres.',
            'address.max' => 'La direccion no debe exceder :max caracteres.',
            'phone.max' => 'El telefono no debe exceder :max caracteres.',
            'city.max' => 'La ciudad no debe exceder :max caracteres.',
        ];
    }

    public function attributes(): array
    {
        return [
            'document_number' => 'numero de cedula',
            'first_name' => 'primer nombre',
            'middle_name' => 'segundo nombre',
            'last_name' => 'apellidos',
            'address' => 'direccion',
            'phone' => 'telefono',
            'city' => 'ciudad',
        ];
    }
}
