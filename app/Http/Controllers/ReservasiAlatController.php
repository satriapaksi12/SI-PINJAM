<?php

namespace App\Http\Controllers;


use PDF;
use View;
use App\Models\Alat;
use App\Models\Unit;
use App\Models\User;
use App\Models\Reservasi_alat;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreReservasi_alatRequest;
use App\Http\Requests\UpdateReservasi_alatRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ReservasiAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi_alat = Alat::with('foto_alat', 'gedung.lokasi')->get();
        return view('reservasi_alat.reservasi-alat', ['reservasi_alat' => $reservasi_alat]);
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
        $alat = Alat::with('gedung.lokasi', 'foto_alat')->findOrFail($id);
        return view('reservasi_alat.tambah_reservasi_alat', ['user' => $user, 'unit' => $unit, 'alat' => $alat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservasi_alatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservasi_alatRequest $request)
    {

        $surat = $request->surat;
        $name = $surat->hashName();
        $surat->move(public_path('/surat/'), $name);
        $namaSurat = 'surat/' . $name;

        $config = [
            'table' => 'reservasi_alats',
            'field' => 'no_reservasi',
            'length' => '12',
            'prefix' => 'SV02-',
        ];

        // now use it
        $no_reservasi = IdGenerator::generate($config);


        $reservasi_alat = new Reservasi_alat();
        $reservasi_alat->kegiatan = $request->kegiatan;
        $reservasi_alat->alasan = $request->alasan;
        $reservasi_alat->surat = $namaSurat;
        $reservasi_alat->no_telepon = $request->no_telepon;
        $reservasi_alat->no_reservasi = $no_reservasi;
        $reservasi_alat->penanggung_jawab = $request->penanggung_jawab;
        $reservasi_alat->status = $request->status;
        $reservasi_alat->tanggal_mulai = $request->tanggal_mulai;
        $reservasi_alat->tanggal_selesai = $request->tanggal_selesai;
        $reservasi_alat->jam_mulai = $request->jam_mulai;
        $reservasi_alat->jam_selesai = $request->jam_selesai;
        $reservasi_alat->user_id = Auth::user()->id;
        $reservasi_alat->unit_id = $request->unit_id;
        $reservasi_alat->alat_id = $request->alat_id;
        $reservasi_alat->save();
        // if ($reservasi_alat) {
        //     Session::flash('status', 'success');
        //     Session::flash('message', 'Data berhasil ditambahkan');
        // }

        return redirect('/daftar-reservasi-alat');
    }
    public function kelolaReservasi()
    {
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi','user')->get();
        return view('reservasi_alat.kelola_reservasi_alat', ['reservasi_alat' => $reservasi_alat]);
    }

    public function daftarReservasi()
    {
        $user =  Auth::user()->id;
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi','user')->where('user_id', $user)->get();
        return view('reservasi_alat.daftar_reservasi_alat', ['reservasi_alat' => $reservasi_alat]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservasi_alat  $reservasi_alat
     * @return \Illuminate\Http\Response
     */
    public function validasi(Reservasi_alat $reservasi_alat, $id)
    {
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')->findOrFail($id);
        return view('reservasi_alat.validasi_reservasi_alat', ['reservasi_alat' => $reservasi_alat]);
    }

    public function simpanValidasi(UpdateReservasi_alatRequest $request, Reservasi_alat $reservasi_alat, $id)
    {
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')->findOrFail($id);
        $reservasi_alat->update($request->all());
        return redirect('/kelola-reservasi-alat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservasi_alat  $reservasi_alat
     * @return \Illuminate\Http\Response
     */

    public function detailReservasi(Reservasi_alat $reservasi_alat, $id)
    {
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')->findOrFail($id);
        return view('reservasi_alat.detail_reservasi_alat', ['reservasi_alat' => $reservasi_alat]);
    }

    public function cetakReservasi(Reservasi_alat $reservasi_alat,$id)
    {

        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')->findOrFail($id);
        $filename = 'cetak-bukti-reservasi.pdf';

        $data = [
            'title' => 'Cetak Bukti Reservasi Alat Sekolah Vokasi UNS',
            'reservasi_alat' => $reservasi_alat
        ];

        $html = view()->make('reservasi_alat.cetak_bukti_reservasi_alat', $data)->render();

        $pdf = new TCPDF;

        $pdf::SetTitle('Cetak Bukti Reservasi');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output(public_path($filename), 'F');

        return response()->download(public_path($filename));
    }






    public function edit(Reservasi_alat $reservasi_alat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservasi_alatRequest  $request
     * @param  \App\Models\Reservasi_alat  $reservasi_alat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservasi_alatRequest $request, Reservasi_alat $reservasi_alat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservasi_alat  $reservasi_alat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservasi_alat $reservasi_alat)
    {
        //
    }
}
