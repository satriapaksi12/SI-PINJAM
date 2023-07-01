<?php

namespace App\Http\Controllers;

use App\Exports\Reservasi_alatsExport;
use PDF;
use View;
use App\Models\Alat;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Reservasi_alat;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StoreReservasi_alatRequest;
use App\Http\Requests\UpdateReservasi_alatRequest;
use App\Imports\Reservasi_alatsImport;

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
    public function create($id)
    {
        $user = User::with('unit')->get();
        $unit = Unit::all();
        $alat = Alat::with('gedung.lokasi', 'foto_alat')->findOrFail($id);
        return view('reservasi_alat.tambah_reservasi_alat', ['user' => $user, 'unit' => $unit, 'alat' => $alat]);
    }
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
        $reservasi_alat->status = "Proses Validasi";
        $reservasi_alat->tanggal_mulai = $request->tanggal_mulai;
        $reservasi_alat->tanggal_selesai = $request->tanggal_selesai;
        $reservasi_alat->jam_mulai = $request->jam_mulai;
        $reservasi_alat->jam_selesai = $request->jam_selesai;
        $reservasi_alat->user_id = Auth::user()->id;
        $reservasi_alat->unit_id = $request->unit_id;
        $reservasi_alat->alat_id = $request->alat_id;
        $reservasi_alat->save();
        return redirect('/daftar-reservasi-alat');
    }
    public function kelolaReservasi()
    {
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi','user')->latest()->get();
        return view('reservasi_alat.kelola_reservasi_alat', ['reservasi_alat' => $reservasi_alat]);
    }

    public function daftarReservasi()
    {
        $user =  Auth::user()->id;
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi','user')->where('user_id', $user)->latest()->get();
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
    public function detailReservasi(Reservasi_alat $reservasi_alat, $id)
    {
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')->findOrFail($id);
        return view('reservasi_alat.detail_reservasi_alat', ['reservasi_alat' => $reservasi_alat]);
    }

    public function cetakReservasi(Reservasi_alat $reservasi_alat,$id)
    {
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi', 'user')->findOrFail($id);
        $data = [
            'reservasi_alat' => $reservasi_alat
        ];
        $html = view()->make('reservasi_alat.cetak_bukti_reservasi_alat', $data)->render();
        $pdf = new TCPDF;
        $pdf::SetTitle('Cetak Bukti Reservasi');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        $filename = 'cetak-bukti-reservasi.pdf';
        $pdf::Output($filename, 'I');
        exit();
    }

    public function cekJadwal()
    {
        $reservasi_alat = Reservasi_alat::with('unit', 'alat.gedung.lokasi','user')->latest()->get();
        return view('reservasi_alat.cekJadwal_alat', ['reservasi_alat' => $reservasi_alat]);
    }

    public function cekKesediaan(Request $request)
    {
        $startDate = $request->cek_tanggal_mulai; // Replace with the desired start date
        $endDate = $request->cek_tanggal_selesai; // Replace with the desired end date
        $startTime = $request->cek_jam_mulai; // Replace with the desired start time
        $endTime = $request->cek_jam_selesai; // Replace with the desired end time
        $unavailableToolIds = Reservasi_alat::where(function ($query) use ($startDate, $endDate, $startTime, $endTime) {
            $query->where(function ($query) use ($startDate, $endDate, $startTime) {
                $query->where('tanggal_mulai', '=', $startDate)
                    ->where('jam_selesai', '>', $startTime);
            })->orWhere(function ($query) use ($startDate, $endDate, $endTime) {
                $query->where('tanggal_selesai', '=', $endDate)
                    ->where('jam_mulai', '<', $endTime);
            })->orWhere(function ($query) use ($startDate, $endDate, $startTime, $endTime) {
                $query->where('tanggal_mulai', '<', $endDate)
                    ->where('tanggal_selesai', '>', $startDate);
            });
        })->where('status', '=', 'Disetujui')->pluck('alat_id');
        $availableTools = Alat::with('foto_alat', 'gedung.lokasi')
            ->whereNotIn('id', $unavailableToolIds)
            ->get();
        return response()->json($availableTools);
    }

    public function exportReservasiAlats()
    {
        return Excel::download(new Reservasi_alatsExport, 'reservasi_alats.xlsx');
    }
    public function importReservasiAlats(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new Reservasi_alatsImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }

}
