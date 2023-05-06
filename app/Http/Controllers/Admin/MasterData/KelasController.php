<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\KelasStoreRequest;
use App\Http\Requests\KelasUpdateRequest;
use App\Models\Admin\MasterData\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.master_data.kelas.index', [
            'title' => 'Kelas',
            'data' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master_data.kelas.create', [
            'title' => 'Tambah Kelas',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\KelasStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasStoreRequest $request)
    {
        $dataPost = $request->validated();

        Kelas::create($dataPost);

        return redirect('admin/master-data/kelas')->with('success', 'Berhasil menambah Kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\MasterData\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\MasterData\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return view('admin.master_data.kelas.edit', [
            'title' => 'Edit Kelas',
            'data' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\KelasUpdateRequest  $request
     * @param  \App\Models\Admin\MasterData\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(KelasUpdateRequest $request, Kelas $kelas)
    {
        $dataPost = $request->validated();

        $kelas->where('id_kelas', $kelas->id_kelas)->update($dataPost);

        return redirect('admin/master-data/kelas')->with('success', 'Berhasil merubah Kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\MasterData\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->destroy($kelas->id_kelas);

        return redirect('admin/master-data/kelas')->with('success', 'Berhasil menghapus Kelas');
    }
}
