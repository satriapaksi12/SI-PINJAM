<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Ruang;
use App\Models\Kendaraan;
use App\Models\Reservasi_alat;
use App\Models\Reservasi_kendaraan;
use App\Models\Reservasi_ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahKendaraan = Kendaraan::count();
        $jumlahRuangan = Ruang::count();
        $jumlahAlat = Alat::count();

        $user =  Auth::user()->id;
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')->where('user_id', $user)->get();
        $jumlahreservasiRuang = count($reservasi_ruang);
        $setujuiRuang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->where('user_id', $user)
            ->where('status', 'disetujui')
            ->get();
        $jumlahsetujuiRuang = count($setujuiRuang);
        $tolakRuang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->where('user_id', $user)
            ->where('status', 'ditolak')
            ->get();
        $jumlahtolakRuang = count($tolakRuang);

        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')->where('user_id', $user)->get();
        $jumlahreservasiAlat = count($reservasi_alat);
        $setujuiAlat =Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')
            ->where('user_id', $user)
            ->where('status', 'disetujui')
            ->get();
        $jumlahsetujuiAlat = count($setujuiAlat);
        $tolakAlat =Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')
            ->where('user_id', $user)
            ->where('status', 'ditolak')
            ->get();
        $jumlahtolakAlat = count($tolakAlat);

        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->where('user_id', $user)->get();
        $jumlahreservasiKendaraan = count($reservasi_kendaraan);
        $setujuiKendaraan =Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')
            ->where('user_id', $user)
            ->where('status', 'disetujui')
            ->get();
        $jumlahsetujuiKendaraan = count( $setujuiKendaraan);
        $tolakKendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')
            ->where('user_id', $user)
            ->where('status', 'ditolak')
            ->get();
        $jumlahtolakKendaraan = count( $tolakKendaraan);
        return view('dashboard', compact('jumlahKendaraan', 'jumlahRuangan', 'jumlahAlat', 'jumlahreservasiRuang', 'jumlahreservasiAlat', 'jumlahreservasiKendaraan', 'jumlahsetujuiRuang', 'jumlahtolakRuang', 'jumlahsetujuiAlat', 'jumlahtolakAlat', 'jumlahsetujuiKendaraan', 'jumlahtolakKendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
