<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgresSkripsiOlehMahasiswaRequest extends FormRequest
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
            'nama_file' => $this->input('status') === 'Lulus' ? 'required|file|mimes:pdf' : '',
            'tanggal_sidang' => $this->input('status') === 'Lulus' ? 'required|date' : ''
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Status pengambilan harus diisi',
            'nilai.required' => 'Nilai harus diisikan jika sudah lulus',
            'nama_file.required' => 'File harus diisikan jika sudah lulus',
            'file' => ':Attribute harus berupa file',
            'mimes' => ':Attribute harus bertipe PDF (berakhiran .pdf)',
            'tanggal_sidang.required' => 'Tanggal sidang harus diisi'
        ];
    }
}
