<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use App\Models\User;


use App\Models\Kendaraan;
use App\Models\Reservasi_kendaraan;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreReservasi_kendaraanRequest;
use App\Http\Requests\UpdateReservasi_kendaraanRequest;

class ReservasiKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi_kendaraan = Kendaraan::with('jenis_kendaraan','gedung.lokasi')->get();
        return view('reservasi-kendaraan', ['reservasi_kendaraan' => $reservasi_kendaraan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::with('unit')->get();
        $unit = Unit::all();
        $kendaraan = Kendaraan::with('gedung.lokasi','jenis_kendaraan')->findOrFail($id);
        return view('tambah_reservasi_kendaraan', ['user' => $user, 'unit' => $unit, 'kendaraan' => $kendaraan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservasi_kendaraanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservasi_kendaraanRequest $request)
    {
        $reservasi_kendaraan = new Reservasi_kendaraan();
        $reservasi_kendaraan->kegiatan = $request->kegiatan;
        $reservasi_kendaraan->alasan = $request->alasan;
        $reservasi_kendaraan->surat = $request->surat;
        $reservasi_kendaraan->penanggung_jawab = $request->penanggung_jawab;
        $reservasi_kendaraan->status = $request->status;
        $reservasi_kendaraan->tanggal_mulai = $request->tanggal_mulai;
        $reservasi_kendaraan->tanggal_selesai = $request->tanggal_selesai;
        $reservasi_kendaraan->jam_mulai = $request->jam_mulai;
        $reservasi_kendaraan->jam_selesai = $request->jam_selesai;
        $reservasi_kendaraan->user_id = $request->user_id;
        $reservasi_kendaraan->unit_id = $request->unit_id;
        $reservasi_kendaraan->kendaraan_id = $request->kendaraan_id;
        $reservasi_kendaraan->save();
        if ($reservasi_kendaraan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservasi_kendaraan  $reservasi_kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Reservasi_kendaraan $reservasi_kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservasi_kendaraan  $reservasi_kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservasi_kendaraan $reservasi_kendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservasi_kendaraanRequest  $request
     * @param  \App\Models\Reservasi_kendaraan  $reservasi_kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservasi_kendaraanRequest $request, Reservasi_kendaraan $reservasi_kendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservasi_kendaraan  $reservasi_kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservasi_kendaraan $reservasi_kendaraan)
    {
        //
    }
}
