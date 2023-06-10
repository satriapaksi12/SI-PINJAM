<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Lokasi;
use App\Http\Requests\StoreGedungRequest;
use App\Http\Requests\UpdateGedungRequest;
use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;

use Illuminate\Support\Facades\Session;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gedung = Gedung::with('lokasi')->get();
        return view('gedung.gedung', ['gedungList' => $gedung]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gedung = Gedung::select('id', 'nama_gedung')->get();
        $lokasi = Lokasi::select('id', 'nama_lokasi')->get();
        return view('gedung.gedung-add', ['gedung' => $gedung, 'lokasi' => $lokasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGedungRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGedungRequest $request)
    {
        $gedung = Gedung::create($request->all());
        if ($gedung) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/gedung');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function edit(Gedung $gedung ,Lokasi $lokasi,$id)
    {
        $gedung = Gedung::with('lokasi')->findOrFail($id);
        $lokasi =Lokasi::select('id', 'nama_lokasi')->where('id', '!=', $gedung->lokasi_id)->get();
        return view('gedung.gedung-edit', ['gedung' => $gedung,'lokasi' => $lokasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGedungRequest  $request
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGedungRequest $request, Gedung $gedung,$id)
    {
        // dd($request->all());
        $gedung =Gedung::findOrFail($id);
        $gedung->update($request->all());

        if ($gedung) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/gedung');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gedung $gedung,$id)
    {
        $deletedGedung = Gedung::findORFail($id);
        $deletedGedung->delete();

        if ($deletedGedung) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }

        return redirect('/gedung');
    }
}
