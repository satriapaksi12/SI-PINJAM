<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kendaraan;
use App\Http\Requests\StoreJenis_kendaraanRequest;
use App\Http\Requests\UpdateJenis_kendaraanRequest;
use Illuminate\Support\Facades\Session;


class JenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_kendaraan = Jenis_kendaraan::all();
        return view('jenis_kendaraan.jenis_kendaraan', ['jeniskendaraanList' => $jenis_kendaraan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_kendaraan.jenis_kendaraan_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJenis_kendaraanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenis_kendaraanRequest $request)
    {
        $jenis_kendaraan = Jenis_kendaraan::create($request->all());
        if ($jenis_kendaraan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }

        return redirect('/jenis_kendaraan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis_kendaraan  $jenis_kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis_kendaraan $jenis_kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis_kendaraan  $jenis_kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenis_kendaraan $jenis_kendaraan,$id)
    {
        $jenis_kendaraan = Jenis_kendaraan::findOrFail($id);
        return view('jenis_kendaraan.jenis_kendaraan_edit',['jenis_kendaraan' => $jenis_kendaraan]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenis_kendaraanRequest  $request
     * @param  \App\Models\Jenis_kendaraan  $jenis_kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenis_kendaraanRequest $request, Jenis_kendaraan $jenis_kendaraan,$id)
    {
        $jenis_kendaraan = Jenis_kendaraan::findOrFail($id);

        // dd($request->all());
        $jenis_kendaraan->update( $request->all());

        if ($jenis_kendaraan) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/jenis_kendaraan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis_kendaraan  $jenis_kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis_kendaraan $jenis_kendaraan,$id)
    {
        $deletedJeniskendaraan = Jenis_kendaraan::findORFail($id);
        $deletedJeniskendaraan->delete();

        return redirect('/jenis_kendaraan');
    }


}
