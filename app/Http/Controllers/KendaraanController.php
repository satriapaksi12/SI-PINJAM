<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Gedung;
use App\Models\Lokasi;
use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use App\Models\Jenis_kendaraan;
use Illuminate\Support\Facades\Session;


class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = Kendaraan::with('jenis_kendaraan','gedung.lokasi')->get();
        return view('kendaraan.kendaraan', ['kendaraanList' => $kendaraan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kendaraan = Jenis_kendaraan::select('id', 'nama_jenis_kendaraan')->get();
        $gedung = Gedung::select('id', 'nama_gedung','lokasi_id')->get();
        $lokasi = Lokasi::select('id', 'nama_lokasi')->get();
        return view('kendaraan.kendaraan-add', ['gedung' => $gedung, 'lokasi' => $lokasi,'jenis_kendaraan' => $jenis_kendaraan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKendaraanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKendaraanRequest $request)
    {
        $kendaraan = Kendaraan::create($request->all());
        if ($kendaraan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/kendaraan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan,$id)
    {

        $data = [
            'kendaraan' => Kendaraan::with('jenis_kendaraan','gedung.lokasi')->findOrFail($id),
            'jenis_kendaraan' => Jenis_kendaraan::pluck('nama_jenis_kendaraan','id'),
            'gedung' => Gedung::pluck('id','nama_gedung'),
            'lokasi' => Lokasi::select('id', 'nama_lokasi')->get(),
        ];

        return view('kendaraan.kendaraan-edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKendaraanRequest  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKendaraanRequest $request, Kendaraan $kendaraan,$id)
    {


        $kendaran =Kendaraan::findOrFail($id);
        $kendaraan->update($request->all());

        if ($kendaraan) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/kendaraan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan,$id)
    {
        $deletedKendaraan = Kendaraan::findORFail($id);
        $deletedKendaraan->delete();

        return redirect('/kendaraan');
    }
}
