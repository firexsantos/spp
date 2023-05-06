<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetugasStoreRequest;
use App\Http\Requests\PetugasUpdateRequest;
use App\Models\Admin\Petugas;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.petugas.index', [
            'title' => 'Petugas',
            'data' => Petugas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petugas.create', [
            'title' => 'Tambah Petugas'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PetugasStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetugasStoreRequest $request)
    {
        $postData = $request->validated();
        $postData['password'] = bcrypt($postData['password']);
        unset($postData['password_confirmation']);

        Petugas::create($postData);

        return redirect('admin/petugas')->with('success', 'Berhasil menambah Petugas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        return view('admin.petugas.edit', [
            'title' => 'Edit Petugas',
            'data' => $petugas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PetugasUpdateRequest  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(PetugasUpdateRequest $request, Petugas $petugas)
    {
        $postData = $request->validated();

        if (!$postData['password']) {
            unset($postData['password']);
            unset($postData['password_confirmation']);
        } else {
            $postData['password'] = bcrypt($postData['password']);
            unset($postData['password_confirmation']);
        }

        $petugas->where('id_petugas', $petugas->id_petugas)->update($postData);

        return redirect('admin/petugas')->with('success', 'Berhasil merubah Petugas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        $petugas->destroy($petugas->id_petugas);

        return redirect('admin/petugas')->with('success', 'Berhasil menghapus Petugas.');
    }
}
