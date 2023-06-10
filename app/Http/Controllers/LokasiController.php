<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;
use Illuminate\Support\Facades\Session;


class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('lokasi.lokasi', ['lokasiList' => $lokasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lokasi.lokasi-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLokasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLokasiRequest $request)
    {
        $lokasi = Lokasi::create($request->all());
        if ($lokasi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }

        return redirect('/lokasi');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi,$id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('lokasi.lokasi-edit',['lokasi' => $lokasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLokasiRequest  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLokasiRequest $request, Lokasi $lokasi,$id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->all());
        if ($lokasi) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/lokasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi,$id)
    {
        $deletedLokasi = Lokasi::findORFail($id);
        $deletedLokasi->delete();

        if ($deletedLokasi) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }

        return redirect('/lokasi');
    }
}
