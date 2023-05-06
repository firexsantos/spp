<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetugasUpdateRequest extends FormRequest
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
            'username' => "required|alpha_num|min:4|unique:petugas,username,{$this->petugas->id_petugas},id_petugas",
            'nama_petugas' => 'required|regex:/^[a-zA-Z.,\s]+$/|min:4',
            'level' => 'required',
            'password' => 'nullable|confirmed|min:6',
            'password_confirmation' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username wajib diisi!',
            'username.alpha_num' => 'Username hanya mendukung alfanumerik!',
            'username.unique' => 'Username sudah terdaftar!',
            'nama_petugas.required' => 'Nama wajib diisi!',
            'nama_petugas.regex' => 'Nama hanya mendukung alfabet!',
            'nama_petugas.min' => 'Nama minimal 4 karakter!',
            'level.required' => 'Wajib memilih level!',
            'password.confirmed' => 'Password tidak sama!',
            'password.min' => 'Password minimal 6 karakter!',
            'password_confirmation.required' => 'Konfirmasi Password wajib diisi!'
        ];
    }
}
