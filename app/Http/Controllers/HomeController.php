<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Ruang;
use App\Models\Kendaraan;
use App\Models\Reservasi_alat;
use App\Models\Reservasi_kendaraan;
use App\Models\Reservasi_ruang;
use ConsoleTVs\Charts\ChartsServiceProvider;
use ConsoleTVs\Charts\Commands\ChartsCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ConsoleTVs\Charts\Facades\Charts;

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
        //ruang
        $user =  Auth::user()->id;
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')->where('user_id', $user)->get();
        $jumlahreservasiRuang = count($reservasi_ruang);
        $setujuiRuang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->where('user_id', $user)
            ->where('status', 'Disetujui')
            ->get();
        $jumlahsetujuiRuang = count($setujuiRuang);
        $tolakRuang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->where('user_id', $user)
            ->where('status', 'Ditolak')
            ->get();
        $jumlahtolakRuang = count($tolakRuang);
        // alat
        // $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')->where('user_id', $user)->get();
        // $jumlahreservasiAlat = count($reservasi_alat);
        // $setujuiAlat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')
        //     ->where('user_id', $user)
        //     ->where('status', 'Disetujui')
        //     ->get();
        // $jumlahsetujuiAlat = count($setujuiAlat);
        // $tolakAlat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')
        //     ->where('user_id', $user)
        //     ->where('status', 'Ditolak')
        //     ->get();
        // $jumlahtolakAlat = count($tolakAlat);
        //kendaraan
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->where('user_id', $user)->get();
        $jumlahreservasiKendaraan = count($reservasi_kendaraan);
        $setujuiKendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')
            ->where('user_id', $user)
            ->where('status', 'Disetujui')
            ->get();
        $jumlahsetujuiKendaraan = count($setujuiKendaraan);
        $tolakKendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')
            ->where('user_id', $user)
            ->where('status', 'Ditolak')
            ->get();
        $jumlahtolakKendaraan = count($tolakKendaraan);
        return view('dashboard', compact('jumlahKendaraan', 'jumlahRuangan', 'jumlahAlat', 'jumlahreservasiRuang',  'jumlahreservasiKendaraan', 'jumlahsetujuiRuang', 'jumlahtolakRuang',  'jumlahsetujuiKendaraan', 'jumlahtolakKendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function grafik()
    {
    }
}
