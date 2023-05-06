<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaStoreRequest;
use App\Http\Requests\SiswaUpdateRequest;
use App\Models\Admin\MasterData\Kelas;
use App\Models\Admin\MasterData\Siswa;
use App\Models\Admin\MasterData\Spp;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.master_data.siswa.index', [
            'title' => 'Siswa',
            'data' => Siswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master_data.siswa.create', [
            'title' => 'Tambah Siswa',
            'kelas' => Kelas::all(),
            'spp' => Spp::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SiswaStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaStoreRequest $request)
    {
        $postData = $request->validated();

        Siswa::create($postData);

        return redirect('admin/master-data/siswa')->with('success', 'Berhasil menambah siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\MasterData\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\MasterData\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.master_data.siswa.edit', [
            'title' => 'Tambah Siswa',
            'kelas' => Kelas::all(),
            'spp' => Spp::all(),
            'data' => $siswa->find($siswa->nisn)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SiswaUpdateRequest  $request
     * @param  \App\Models\Admin\MasterData\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(SiswaUpdateRequest $request, Siswa $siswa)
    {
        $postData = $request->validated();

        $siswa->where('nisn', $siswa->nisn)->update($postData);

        return redirect('admin/master-data/siswa')->with('success', 'Berhasil merubah siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\MasterData\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->destroy($siswa->nisn);

        return redirect('admin/master-data/siswa')->with('success', 'Berhasil menghapus siswa');
    }
}
