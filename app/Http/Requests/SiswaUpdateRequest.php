<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaUpdateRequest extends FormRequest
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
            'nisn' => 'required|unique:siswa,nisn,' . $this->siswa->nisn . ',nisn',
            'nis' => 'required|unique:siswa,nis,' . $this->siswa->nisn . ',nisn',
            'nama' => 'required|regex:/^[a-zA-Z.,\s]+$/|min:4',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|numeric|min:10',
            'id_spp' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nisn.required' => 'NISN wajib diisi!',
            'nisn.unique' => 'NISN sudah terdaftar!',
            'nis.required' => 'NIS wajib diisi!',
            'nis.unique' => 'NIS sudah terdaftar!',
            'nama.required' => 'Nama wajib diisi!',
            'nama.regex' => 'Nama hanya mendukung alfabet!',
            'nama.min' => 'Nama minimal 4 karakter!',
            'id_kelas.required' => 'Wajib memilih kelas!',
            'alamat.required' => 'Alamat wajib diisi!',
            'no_telp.required' => 'No. telepon wajib diisi!',
            'no_telp.numeric' => 'No. telepon hanya mendukung numerik!',
            'no_telp.min' => 'No. telepon minimal 10 karakter!',
            // 'no_telp.max' => 'No. telepon maksimal 13 karakter!',
            'id_spp.required' => 'Wajib memilih SPP!'
        ];
    }
}
