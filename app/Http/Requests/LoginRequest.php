<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required',
            'password' => 'required',
            'remember' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Silahkan masukkan username!',
            'password' => 'Silahkan masukkan password!'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
