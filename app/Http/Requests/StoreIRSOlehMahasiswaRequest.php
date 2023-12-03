<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIRSOlehMahasiswaRequest extends FormRequest
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
            'semester' => 'required',
            'sks' => 'required|gte:2|lte:24',
            'nama_file' => 'required|file|mimes:pdf'
        ];
    }

    public function attributes()
    {
        return [
            'semester' => 'Semester',
            'sks' => 'Satuan kredit semester/SKS',
            'nama_file' => 'File'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':Attribute harus diisi',
            'sks.gte' => ':Attribute harus lebih besar atau sama dengan :value',
            'sks.lte' => ':Attribute harus lebih kecil atau sama dengan :value',
            'file' => ':Attribute harus berupa file',
            'mimes' => ':Attribute harus bertipe PDF (berakhiran .pdf)'
        ];
    }
}
