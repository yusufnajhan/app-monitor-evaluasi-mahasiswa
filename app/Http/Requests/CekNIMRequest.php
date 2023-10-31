<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CekNIMRequest extends FormRequest
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
            'nim' => 'required|digits:14'
        ];
    }

    public function attributes()
    {
        return [
            'nim' => 'NIM'
        ];
    }

    public function messages()
    {
        return [
            'nim.required' => ':attribute harus diisi',
            'nim.digits' => ':attribute terdiri dari 14 digit'
        ];
    }
}
