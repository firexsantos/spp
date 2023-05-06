<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SppUpdateRequest extends FormRequest
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
            'tahun' => 'required|numeric|digits:4|unique:spp,tahun,' . $this->spp->id_spp . ',id_spp',
            'nominal' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'tahun.digits' => 'Tahun ajaran harus 4 digit!',
            'tahun.required' => 'Tahun ajaran wajib diisi!',
            'tahun.unique' => 'Tahun ajaran sudah ada!',
            'nominal.required' => 'Nominal wajib diisi!'
        ];
    }
}
