<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranUpdateRequest extends FormRequest
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
            'nisn' => 'required',
            // 'tgl_bayar' => 'required',
            'bulan_dibayar' => 'required|alpha',
            'tahun_dibayar' => 'required',
            'jumlah_bayar' => 'required'
        ];
    }

    public function messages()
    {
        return [
            // 'tgl_bayar.required' => 'Wajib memilih tanggal pembayaran!',
            'bulan_dibayar.required' => 'Bulan dibayar wajib diisi!',
            'bulan_dibayar.alpha' => 'Hanya mendukung alfabet!',
            'tahun_dibayar.required' => 'Tahun dibayar wajib diisi!',
            'jumlah_bayar.required' => 'Jumlah bayar wajib diisi!'
        ];
    }
}
