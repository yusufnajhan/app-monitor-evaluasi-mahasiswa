<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgresPKLOlehMahasiswaRequest extends FormRequest
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
        $semesterMaks = auth()->user()->mahasiswa->hitungSemester();

        return [
            'semester' => [
                'required',
                'gte:6',
                function ($attribute, $value, $fail) use ($semesterMaks) {
                    if ($value > $semesterMaks) {
                        $fail('Semester harus lebih kecil atau sama dengan semester saat ini');
                    }
                }
            ],
            'nilai' => 'required|gte:0|lte:100',
            'nama_file' => 'required|file|mimes:pdf'
        ];
    }

    public function attributes()
    {
        return [
            'semester' => 'Semester',
            'nilai' => 'Nilai',
            'nama_file' => 'File'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':Attribute harus diisi',
            'gte' => ':Attribute harus lebih besar atau sama dengan :value',
            'lte' => ':Attribute harus lebih kecil atau sama dengan :value',
            'file' => ':Attribute harus berupa file',
            'mimes' => ':Attribute harus bertipe PDF (berakhiran .pdf)'
        ];
    }
}
