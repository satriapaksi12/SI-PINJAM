<?php

namespace App\Http\Controllers;

use App\Exports\Reservasi_kendaraansExport;
use PDF;
use View;
use App\Models\Unit;
use App\Models\User;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Models\Reservasi_kendaraan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StoreReservasi_kendaraanRequest;
use App\Http\Requests\UpdateReservasi_kendaraanRequest;
use App\Imports\Reservasi_kendaraansImport;

class ReservasiKendaraanController extends Controller
{

    public function index()
    {
        $reservasi_kendaraan = Kendaraan::with('jenis_kendaraan', 'gedung.lokasi', 'reservasi_kendaraan')->get();
        return view('reservasi_kendaraan.reservasi-kendaraan', ['reservasi_kendaraan' => $reservasi_kendaraan]);
    }
    public function create($id)
    {
        $user = User::with('unit')->get();
        $unit = Unit::all();
        $kendaraan = Kendaraan::with('gedung.lokasi', 'jenis_kendaraan')->findOrFail($id);
        return view('reservasi_kendaraan.tambah_reservasi_kendaraan', ['user' => $user, 'unit' => $unit, 'kendaraan' => $kendaraan]);
    }
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
        $no_reservasi = IdGenerator::generate($config);
        $reservasi_kendaraan = new Reservasi_kendaraan();
        $reservasi_kendaraan->kegiatan = $request->kegiatan;
        $reservasi_kendaraan->alasan = $request->alasan;
        $reservasi_kendaraan->surat = $namaSurat;
        $reservasi_kendaraan->no_telepon = $request->no_telepon;
        $reservasi_kendaraan->no_reservasi = $no_reservasi;
        $reservasi_kendaraan->penanggung_jawab = $request->penanggung_jawab;
        $reservasi_kendaraan->status = "Proses Validasi";
        $reservasi_kendaraan->tanggal_mulai = $request->tanggal_mulai;
        $reservasi_kendaraan->tanggal_selesai = $request->tanggal_selesai;
        $reservasi_kendaraan->jam_mulai = $request->jam_mulai;
        $reservasi_kendaraan->jam_selesai = $request->jam_selesai;
        $reservasi_kendaraan->user_id = Auth::user()->id;
        $reservasi_kendaraan->unit_id = $request->unit_id;
        $reservasi_kendaraan->kendaraan_id = $request->kendaraan_id;
        $reservasi_kendaraan->save();
        return redirect('/daftar-reservasi-kendaraan');
    }

    public function kelolaReservasi()
    {
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->latest()->get();
        return view('reservasi_kendaraan.kelola_reservasi_kendaraan', ['reservasi_kendaraan' => $reservasi_kendaraan]);
    }
    public function daftarReservasi()
    {
        $user =  Auth::user()->id;
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->where('user_id', $user)
        ->latest()->get();
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

    public function cetakReservasi(Reservasi_kendaraan $reservasi_kendaraan, $id)
    {
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user', 'kendaraan.jenis_kendaraan')
        ->findOrFail($id);
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

    public function cekJadwal()
    {
        $reservasi_kendaraan = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'user')->latest()->get();
        return view('reservasi_kendaraan.cekJadwal_kendaraan', ['reservasi_kendaraan' => $reservasi_kendaraan]);
    }

    public function cekKesediaan(Request $request)
    {
        $startDate = $request->cek_tanggal_mulai; // Replace with the desired start date
        $endDate = $request->cek_tanggal_selesai; // Replace with the desired end date
        $startTime = $request->cek_jam_mulai; // Replace with the desired start time
        $endTime = $request->cek_jam_selesai; // Replace with the desired end time
        $unavailableVehicleIds = Reservasi_kendaraan::where(function ($query) use ($startDate, $endDate, $startTime, $endTime) {
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
        })->where('status', '=', 'Disetujui')->pluck('kendaraan_id');
        $availableVehicles = Kendaraan::with('jenis_kendaraan', 'gedung.lokasi', 'reservasi_kendaraan')
            ->whereNotIn('id', $unavailableVehicleIds)
            ->get();
        return response()->json($availableVehicles);
    }

    public function exportReservasiKendaraans()
    {
        return Excel::download(new Reservasi_kendaraansExport, 'reservasi_kendaraans.xlsx');
    }

    public function importReservasiKendaraans(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new Reservasi_kendaraansImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
