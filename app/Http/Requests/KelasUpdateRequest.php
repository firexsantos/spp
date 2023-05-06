<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_kelas' => 'required|unique:kelas,nama_kelas,' . $this->kelas->id_kelas . ',id_kelas',
            'kompetensi_keahlian' => 'required|regex:/^[a-zA-Z.,\s]+$/'
        ];
    }

    public function messages()
    {
        return [
            'nama_kelas.required' => 'Nama kelas ajaran wajib diisi!',
            'nama_kelas.unique' => 'Nama kelas ajaran sudah ada!',
            'kompetensi_keahlian.required' => 'Kompetensi keahlian wajib diisi!',
            'kompetensi_keahlian.regex' => 'Kompetensi keahlian hanya mendukung alfabet!'
        ];
    }
}
