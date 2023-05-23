<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use App\Models\User;
use PDF;
use View;
use App\Models\Kendaraan;
use App\Models\Reservasi_kendaraan;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreReservasi_kendaraanRequest;
use App\Http\Requests\UpdateReservasi_kendaraanRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;


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
        return view('reservasi_kendaraan.reservasi-kendaraan', ['reservasi_kendaraan' => $reservasi_kendaraan]);
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
        return view('reservasi_kendaraan.tambah_reservasi_kendaraan', ['user' => $user, 'unit' => $unit, 'kendaraan' => $kendaraan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservasi_kendaraanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservasi_kendaraanRequest $request)
    {

        $surat = $request->surat;
        $name = $surat->hashName();
        $surat->move(public_path('/surat/'), $name);
        $namaSurat = 'surat/' . $name;

        $config = [
            'table' => 'reservasi_kendaraans',
            'field' => 'no_reservasi',
            'length' => '12',
            'prefix' => 'SV03-',
        ];

        // now use it
        $no_reservasi = IdGenerator::generate($config);



        $reservasi_kendaraan = new Reservasi_kendaraan();
        $reservasi_kendaraan->kegiatan = $request->kegiatan;
        $reservasi_kendaraan->alasan = $request->alasan;
        $reservasi_kendaraan->surat = $namaSurat;
        $reservasi_kendaraan->no_telepon = $request->no_telepon;
        $reservasi_kendaraan->no_reservasi = $no_reservasi;
        $reservasi_kendaraan->penanggung_jawab = $request->penanggung_jawab;
        $reservasi_kendaraan->status = $request->status;
        $reservasi_kendaraan->tanggal_mulai = $request->tanggal_mulai;
        $reservasi_kendaraan->tanggal_selesai = $request->tanggal_selesai;
        $reservasi_kendaraan->jam_mulai = $request->jam_mulai;
        $reservasi_kendaraan->jam_selesai = $request->jam_selesai;
        $reservasi_kendaraan->user_id = Auth::user()->id;
        $reservasi_kendaraan->unit_id = $request->unit_id;
        $reservasi_kendaraan->kendaraan_id = $request->kendaraan_id;
        $reservasi_kendaraan->save();
        // if ($reservasi_kendaraan) {
        //     Session::flash('status', 'success');
        //     Session::flash('message', 'Data berhasil ditambahkan');
        // }

        return redirect('/daftar-reservasi-kendaraan');

    }

    public function kelolaReservasi()
    {
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->get();
        return view('reservasi_kendaraan.kelola_reservasi_kendaraan', ['reservasi_kendaraan' => $reservasi_kendaraan]);
    }
    public function daftarReservasi()
    {
        $user =  Auth::user()->id;
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->where('user_id', $user)->get();
        return view('reservasi_kendaraan.daftar_reservasi_kendaraan', ['reservasi_kendaraan' => $reservasi_kendaraan]);
    }
    public function validasi(Reservasi_kendaraan $reservasi_kendaraan, $id)
    {
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->findOrFail($id);
        return view('reservasi_kendaraan.validasi_reservasi_kendaraan', ['reservasi_kendaraan' => $reservasi_kendaraan]);
    }

    public function simpanValidasi(UpdateReservasi_kendaraanRequest $request, Reservasi_kendaraan $reservasi_kendaraan, $id)
    {
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->findOrFail($id);
        $reservasi_kendaraan->update($request->all());
        return redirect('/kelola-reservasi-kendaraan');
    }

    public function detailReservasi(Reservasi_kendaraan $reservasi_kendaraan, $id)
    {
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->findOrFail($id);
        return view('reservasi_kendaraan.detail_reservasi_kendaraan', ['reservasi_kendaraan' =>  $reservasi_kendaraan]);
    }

    public function cetakReservasi(Reservasi_kendaraan $reservasi_kendaraan,$id)
    {
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user' ,'kendaraan.jenis_kendaraan')->findOrFail($id);
        $filename = 'cetak-bukti-reservasi.pdf';

        $data = [
            'title' => 'Cetak Bukti Reservasi Kendaraan Sekolah Vokasi UNS',
            'reservasi_kendaraan' => $reservasi_kendaraan
        ];

        $html = view()->make('reservasi_kendaraan.cetak_bukti_reservasi_kendaraan', $data)->render();

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
