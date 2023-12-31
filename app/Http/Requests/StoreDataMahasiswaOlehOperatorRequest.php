<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataMahasiswaOlehOperatorRequest extends FormRequest
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
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa',
            'angkatan' => 'required',
            'dosen_wali' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'nim' => 'NIM',
            'dosen_wali' => 'Dosen Wali'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':Attribute wajib diisi!',
            'unique' => ':ATTRIBUTE sudah terdaftar!'
        ];
    }
}
