<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKHSOlehMahasiswaRequest extends FormRequest
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
            'sks_semester' => 'required|lte:24',
            'sks_kumulatif' => 'required|numeric',
            'ip_semester' => 'required|gte:0.0|lte:4.0',
            'ip_kumulatif' => 'required|numeric',
            'nama_file' => 'required|file|mimes:pdf'
        ];
    }

    public function attributes()
    {
        return [
            'sks_semester' => 'Satuan kredit semester/SKS semester ini',
            'sks_kumulatif' => 'Satuan kredit semester/SKS kumulatif',
            'ip_semester' => 'Indeks prestasi/IP semester ini',
            'ip_kumulatif' => 'Indeks prestasi/IP kumulatif',
            'nama_file' => 'File'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':Attribute harus diisi',
            'gte' => ':Attribute harus lebih besar atau sama dengan :value',
            'lte' => ':Attribute harus lebih kecil atau sama dengan :value'
        ];
    }
}
