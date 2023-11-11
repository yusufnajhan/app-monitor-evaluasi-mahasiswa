<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgresSkripsiOlehDosenWaliRequest extends FormRequest
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
            'status' => 'required',
            'nilai' => $this->input('status') === 'Lulus' ? 'required' : '',
            'tanggal_sidang' => $this->input('status') === 'Lulus' ? 'required|date' : ''
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Status pengambilan harus diisi',
            'nilai.required' => 'Nilai harus diisikan jika sudah lulus',
            'tanggal_sidang.required' => 'Tanggal sidang harus diisi'
        ];
    }
}
