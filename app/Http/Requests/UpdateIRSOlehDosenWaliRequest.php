<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIRSOlehDosenWaliRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sks' => 'required|lte:24',
        ];
    }

    public function attributes()
    {
        return [
            'sks' => 'Satuan kredit semester/SKS',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':Attribute harus diisi',
            'sks.gte' => ':Attribute harus lebih besar atau sama dengan :value',
            'sks.lte' => ':Attribute harus lebih kecil atau sama dengan :value'
        ];
    }
}
