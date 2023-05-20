<?php

namespace App\Http\Controllers;

use PDF;
use View;
use App\Models\Sesi;
use App\Models\Unit;
use App\Models\User;
use App\Models\Ruang;
use App\Models\Periode;
use App\Models\Jenis_acara;
use App\Models\Reservasi_ruang;
use Elibyy\TCPDF\Facades\TCPDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StoreReservasi_ruangRequest;
use App\Http\Requests\UpdateReservasi_ruangRequest;


class ReservasiRuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi_ruang = Ruang::with('foto_ruang', 'gedung.lokasi')->get();
        return view('reservasi_ruang.reservasi-ruangan', ['reservasi_ruang' => $reservasi_ruang]);
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
        $periode = Periode::all();
        $sesi = Sesi::all();
        $jenis_acara = Jenis_acara::all();
        $ruang = Ruang::with('gedung.lokasi', 'foto_ruang' ,'reservasi_ruang')->findOrFail($id);


        $tanggalMulai = Reservasi_ruang::select('tanggal_mulai')->get();
        $date = Carbon::createFromFormat('Y-m-d', $tanggalMulai);
        $date->locale('id');
        $namaHari = $date->format('l');
        $sesiMulai = $sesi->where('hari', $namaHari);
        return view('reservasi_ruang.tambah_reservasi_ruangan', ['sesiMulai' => $sesiMulai,'periode' => $periode, 'jenis_acara' => $jenis_acara, 'sesi' => $sesi, 'user' => $user, 'unit' => $unit, 'ruang' => $ruang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservasi_ruangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservasi_ruangRequest $request)
    {



        $surat = $request->surat;
        $name = $surat->hashName();
        $surat->move(public_path('/surat/'), $name);
        $namaSurat = 'surat/' . $name;

        $config = [
            'table' => 'reservasi_alats',
            'field' => 'no_reservasi',
            'length' => '12',
            'prefix' => 'SV01-',
        ];

        // now use it
        $no_reservasi = IdGenerator::generate($config);



        $reservasi_ruang = new Reservasi_ruang();
        $reservasi_ruang->kegiatan = $request->kegiatan;
        $reservasi_ruang->alasan = $request->alasan;
        $reservasi_ruang->surat = $namaSurat;
        $reservasi_ruang->no_telepon = $request->no_telepon;
        $reservasi_ruang->no_reservasi = $no_reservasi;
        $reservasi_ruang->penanggung_jawab = $request->penanggung_jawab;
        $reservasi_ruang->status = $request->status;
        $reservasi_ruang->kelas = $request->kelas;
        $reservasi_ruang->tanggal_mulai = $request->tanggal_mulai;
        $reservasi_ruang->tanggal_selesai = $request->tanggal_selesai;
        $reservasi_ruang->user_id = Auth::user()->id;
        $reservasi_ruang->unit_id = $request->unit_id;
        $reservasi_ruang->sesi_id = $request->sesi_id;
        $reservasi_ruang->ruang_id = $request->ruang_id;
        $reservasi_ruang->jenis_acara_id = $request->jenis_acara_id;
        $reservasi_ruang->periode_id = $request->periode_id;
        $reservasi_ruang->save();



        return redirect('/reservasi-ruang');
    }

    public function kelolaReservasi()
    {
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')->get();
        return view('reservasi_ruang.kelola_reservasi_ruangan', ['reservasi_ruang' => $reservasi_ruang]);
    }

    public function validasi(Reservasi_ruang $reservasi_ruang, $id)
    {
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')->findOrFail($id);
        return view('reservasi_ruang.validasi_reservasi_ruangan', ['reservasi_ruang' => $reservasi_ruang]);
    }

    public function simpanValidasi(UpdateReservasi_ruangRequest $request, Reservasi_ruang $reservasi_ruang, $id)
    {
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')->findOrFail($id);
        $reservasi_ruang->update($request->all());
        return redirect('/kelola-reservasi-ruang');
    }

    public function detailReservasi(Reservasi_ruang $reservasi_ruang, $id)
    {
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')->findOrFail($id);
        return view('reservasi_ruang.detail_reservasi_ruangan', ['reservasi_ruang' => $reservasi_ruang]);
    }

    public function cetakReservasi(Reservasi_ruang $reservasi_ruang, $id)
    {

        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')->findOrFail($id);
        $filename = 'cetak-bukti-reservasi.pdf';

        $data = [
            'reservasi_ruang' => $reservasi_ruang
        ];

        $html = view()->make('reservasi_ruang.cetak_bukti_reservasi_ruangan', $data)->render();

        $pdf = new TCPDF;

        $pdf::SetTitle('Cetak Bukti Reservasi');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output(public_path($filename), 'F');

        return response()->download(public_path($filename));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservasi_ruang  $reservasi_ruang
     * @return \Illuminate\Http\Response
     */
    public function show(Reservasi_ruang $reservasi_ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservasi_ruang  $reservasi_ruang
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservasi_ruang $reservasi_ruang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservasi_ruangRequest  $request
     * @param  \App\Models\Reservasi_ruang  $reservasi_ruang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservasi_ruangRequest $request, Reservasi_ruang $reservasi_ruang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservasi_ruang  $reservasi_ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservasi_ruang $reservasi_ruang)
    {
        //
    }
}
