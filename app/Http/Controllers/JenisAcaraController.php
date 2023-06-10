<?php

namespace App\Http\Controllers;

use App\Models\Jenis_acara;
use App\Http\Requests\StoreJenis_acaraRequest;
use App\Http\Requests\UpdateJenis_acaraRequest;
use Illuminate\Support\Facades\Session;

class JenisAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_acara = Jenis_acara::all();
        return view('jenis_acara.jenis_acara', ['jenisacaraList' => $jenis_acara]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_acara.jenis_acara_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJenis_acaraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenis_acaraRequest $request)
    {
        $jenis_acara = Jenis_acara::create($request->all());
        if ($jenis_acara) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }

        return redirect('/jenis_acara');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis_acara  $jenis_acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenis_acara $jenis_acara,$id)
    {
        $jenis_acara = Jenis_acara::findOrFail($id);
        return view('jenis_acara.jenis_acara_edit',['jenis_acara' => $jenis_acara]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenis_acaraRequest  $request
     * @param  \App\Models\Jenis_acara  $jenis_acara
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenis_acaraRequest $request, Jenis_acara $jenis_acara,$id)
    {
        $jenis_acara = Jenis_acara::findOrFail($id);

        // dd($request->all());
        $jenis_acara->update( $request->all());

        if ($jenis_acara) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/jenis_acara');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis_acara  $jenis_acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis_acara $jenis_acara,$id)
    {
        $deletedJenisacara = Jenis_acara::findORFail($id);
        $deletedJenisacara->delete();
        if ($deletedJenisacara) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/jenis_acara');
    }
}
