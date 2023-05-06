<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Admin\MasterData\Spp;
use App\Http\Requests\SppStoreRequest;
use App\Http\Requests\SppUpdateRequest;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.master_data.spp.index', [
            'title' => 'SPP',
            'data' => Spp::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master_data.spp.create', [
            'title' => 'Tambah SPP',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SppStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SppStoreRequest $request)
    {
        $dataPost = $request->validated();

        Spp::create($dataPost);

        return redirect('admin/master-data/spp')->with('success', 'Berhasil menambah SPP');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\MAsterData\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\MAsterData\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit(Spp $spp)
    {
        return view('admin.master_data.spp.edit', [
            'title' => 'Edit SPP',
            'data' => $spp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SppStoreRequest  $request
     * @param  \App\Models\Admin\MAsterData\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(SppUpdateRequest $request, Spp $spp)
    {
        $dataPost = $request->validated();

        $spp->where('id_spp', $spp->id_spp)->update($dataPost);

        return redirect('admin/master-data/spp')->with('success', 'Berhasil merubah SPP');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\MAsterData\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spp $spp)
    {
        // Spp::destroy($spp->id_spp);
        $spp->destroy($spp->id_spp);

        return redirect('admin/master-data/spp')->with('success', 'Berhasil menghapus SPP');
    }
}
