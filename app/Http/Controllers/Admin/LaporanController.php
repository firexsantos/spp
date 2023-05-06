<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf as PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index', [
            'title' => 'Laporan Pembayaran',
            'level' => Auth::guard('petugas')->user()->level,
            'bulan' => Pembayaran::select('bulan_dibayar')->distinct()->get(),
            'tahun' => Pembayaran::select('tahun_dibayar')->distinct()->get()
        ]);
    }

    public function generatePDF(Request $request)
    {
        $param = $request->validate(
            [
                'bulan_dibayar' => 'required',
                'tahun_dibayar' => 'required'
            ],
            [
                'bulan_dibayar.required' => 'Silahkan pilih bulan!',
                'tahun_dibayar.required' => 'Silahkan pilih tahun!'
            ]
        );

        $data = [
            'title' => 'Laporan Pembayaran SPP',
            'data' => Pembayaran::where(['bulan_dibayar' => $param['bulan_dibayar'], 'tahun_dibayar' => $param['tahun_dibayar']])->get(),
            'waktu' => $param,
            'petugas' => Auth::guard('petugas')->user()->nama_petugas
        ];
        $html = view('admin.laporan.laporan', $data)->render();
        $pdf = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);

        $pdf->WriteHTML($html);
        $pdf->output('Laporan', 'I');
    }
}
