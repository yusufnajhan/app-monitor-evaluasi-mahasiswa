<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataMahasiswaOlehMahasiswaRequest extends FormRequest
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
            'jalur_masuk' => 'required',
            'no_telepon' => 'required|min:10|max:13|number',
            'alamat' => 'required|min:5',
            'kota' => 'required',
            'provinsi' => 'required',
            // 'email' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function attributes()
    {
        return [
            'jalur_masuk' => 'Jalur masuk',
            'no_telepon' => 'Nomor telepon',
            'alamat' => 'Alamat',
            'kota' => 'Kota',
            'provinsi' => 'Provinsi',
            // 'email' => 'Email',
            'password' => 'Password',
            'confirm_password' => 'Konfirmasi password'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':Attribute wajib diisi!',
            'unique' => ':ATTRIBUTE sudah terdaftar!',
            'number' => ':Attribute harus berisi angka saja!',
            'min' => ':Attribute minimal terdiri dari :min karakter!',
            'max' => ':Attribute maksimal terdiri dari :max karakter!',
            'same' => ':Attribute harus sama!'
        ];
    }
}
