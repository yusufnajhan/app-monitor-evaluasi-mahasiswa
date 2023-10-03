<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes()
    {
        return [
            'student-number' => 'NIM',
            'name' => 'nama',
            'batch' => 'angkatan'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field :attribute wajib diisi.',
            'unique' => ':attribute :input sudah ada di dalam database.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student-number' => 'required|unique:students,student-number',
            'name' => 'required',
            'batch' => 'required'
        ];
    }
}
