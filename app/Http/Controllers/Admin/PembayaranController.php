<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranStoreRequest;
use App\Http\Requests\PembayaranUpdateRequest;
use App\Models\Admin\MasterData\Siswa;
use App\Models\Admin\Pembayaran;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pembayaran.index', [
            'title' => 'Pembayaran',
            'data' => Pembayaran::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pembayaran.create', [
            'title' => 'Tambah Pembayaran',
            'siswa' => Siswa::all(),
            'bulan' => $this->bulan(),
            'level' => $this->user()->level
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PembayaranStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembayaranStoreRequest $request)
    {
        $level = $this->user()->level;
        date_default_timezone_set('Asia/Jakarta');

        $postData = $request->validated();
        $postData['id_petugas'] = $this->user()->id_petugas;
        $postData['tgl_bayar'] = date('Y-m-d');

        Pembayaran::create($postData);

        return redirect("$level/pembayaran")->with('success', 'Berhasil melakukan pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('admin.pembayaran.edit', [
            'title' => 'Edit Pembayaran',
            'data' => $pembayaran,
            'siswa' => Siswa::all(),
            'bulan' => $this->bulan(),
            'level' => $this->user()->level
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PembayaranUpdateRequest  $request
     * @param  \App\Models\Admin\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(PembayaranUpdateRequest $request, Pembayaran $pembayaran)
    {
        $level = $this->user()->level;
        date_default_timezone_set('Asia/Jakarta');

        $postData = $request->validated();
        $postData['id_petugas'] = $this->user()->id_petugas;
//        $postData['tgl_bayar'] = date('Y-m-d');

        $pembayaran->where('id_pembayaran',$pembayaran->id_pembayaran)->update($postData);

        return redirect("$level/pembayaran")->with('success', 'Berhasil melakukan pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $level = $this->user()->level;

        $pembayaran->destroy($pembayaran->id_pembayaran);

        return redirect("$level/pembayaran")->with('success', 'Berhasil menghapus pembayaran');
    }

    public function user()
    {
        $user = Auth::guard('petugas')->user();
        return $user;
    }

    public function bulan()
    {
        return [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
    }
}
