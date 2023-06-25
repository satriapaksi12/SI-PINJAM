<?php

namespace App\Http\Controllers;

use App\Exports\Reservasi_ruangsExport;
use PDF;
use View;
use Carbon\Carbon;
use App\Models\Sesi;
use App\Models\Unit;
use App\Models\User;
use App\Models\Ruang;
use App\Models\Periode;
use App\Models\Jenis_acara;
use Illuminate\Http\Request;
use App\Models\Reservasi_ruang;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StoreReservasi_ruangRequest;
use App\Http\Requests\UpdateReservasi_ruangRequest;
use App\Imports\Reservasi_ruangsImport;

class ReservasiRuangController extends Controller
{
    public function index()
    {
        $sesi = Sesi::all();
        $reservasi_ruang = Ruang::with('foto_ruang', 'gedung.lokasi')->get();
        return view('reservasi_ruang.reservasi-ruangan', ['reservasi_ruang' => $reservasi_ruang, 'sesi' => $sesi]);
    }

    public function create($id)
    {
        $user = User::with('unit')->get();
        $unit = Unit::all();
        $periode = Periode::where('status', 'Aktif')->get();
        $sesi = Sesi::all();
        $jenis_acara = Jenis_acara::all();
        $ruang = Ruang::with('gedung.lokasi', 'foto_ruang', 'reservasi_ruang')->findOrFail($id);

        return view(
            'reservasi_ruang.tambah_reservasi_ruangan',
            ['periode' => $periode, 'jenis_acara' => $jenis_acara, 'sesi' => $sesi, 'user' => $user, 'unit' => $unit, 'ruang' => $ruang]
        );
    }

    public function store(StoreReservasi_ruangRequest $request)
    {
        if ($request->hasFile('surat')) {
            $surat = $request->file('surat');
            $name = $surat->hashName();
            $surat->move(public_path('/surat/'), $name);
            $namaSurat = 'surat/' . $name;
        } else {
            $namaSurat = "Tidak ada Surat";
        }
        $config = [
            'table' => 'reservasi_ruangs',
            'field' => 'no_reservasi',
            'length' => '12',
            'prefix' => 'SV01-',
        ];

        $no_reservasi = IdGenerator::generate($config);
        if ($request->jenis_acara_id == 1) {
            $reservasi_ruang = new Reservasi_ruang();
            $reservasi_ruang->kegiatan = $request->kegiatan;
            $reservasi_ruang->alasan = $request->alasan;
            $reservasi_ruang->surat = $namaSurat;
            $reservasi_ruang->surat = $namaSurat;
            $reservasi_ruang->no_telepon = $request->no_telepon;
            $reservasi_ruang->no_reservasi = $no_reservasi;
            $reservasi_ruang->penanggung_jawab = $request->penanggung_jawab;
            $reservasi_ruang->status = "Proses Validasi";
            $reservasi_ruang->kelas = $request->kelas;
            $reservasi_ruang->tanggal_mulai = $request->tanggal_mulai;
            $reservasi_ruang->tanggal_selesai = $request->tanggal_selesai;
            $reservasi_ruang->user_id = Auth::user()->id;
            $reservasi_ruang->unit_id = $request->unit_id;
            $reservasi_ruang->ruang_id = $request->ruang_id;
            $reservasi_ruang->jenis_acara_id = $request->jenis_acara_id;
            $reservasi_ruang->periode_id = $request->periode_id;
            $reservasi_ruang->save();
            // Simpan relasi dengan Sesi
            $reservasi_ruang->sesi()->attach($request->sesi_id);
            // $reservasi_ruang->sesi()->sync($request->sesi_id);

        } elseif ($request->jenis_acara_id == 2) {
            $reservasi_ruang = new Reservasi_ruang();
            $reservasi_ruang->kegiatan = $request->kegiatan;
            $reservasi_ruang->alasan = $request->alasan;
            $reservasi_ruang->surat = $namaSurat;
            $reservasi_ruang->no_telepon = $request->no_telepon;
            $reservasi_ruang->no_reservasi = $no_reservasi;
            $reservasi_ruang->penanggung_jawab = $request->penanggung_jawab;
            $reservasi_ruang->status = "Proses Validasi";
            $reservasi_ruang->kelas = $request->kelas;
            $reservasi_ruang->tanggal_mulai = $request->tanggal_mulai;
            $reservasi_ruang->tanggal_selesai = $request->tanggal_selesai;
            $reservasi_ruang->user_id = Auth::user()->id;
            $reservasi_ruang->unit_id = $request->unit_id;
            $reservasi_ruang->ruang_id = $request->ruang_id;
            $reservasi_ruang->jenis_acara_id = $request->jenis_acara_id;
            $reservasi_ruang->periode_id = $request->periode_id;
            $reservasi_ruang->save();
            // Simpan relasi dengan Sesi
            $reservasi_ruang->sesi()->attach($request->sesi_id);
            // $reservasi_ruang->sesi()->sync($request->sesi_id);

        }


        return redirect('/daftar-reservasi-ruang');
    }

    public function kelolaReservasi()
    {
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->latest()->get();
        return view('reservasi_ruang.kelola_reservasi_ruangan', ['reservasi_ruang' => $reservasi_ruang]);
    }
    public function daftarReservasi()
    {
        $user =  Auth::user()->id;
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->where('user_id', $user)->latest()->get();
        return view('reservasi_ruang.daftar_reservasi_ruang', ['reservasi_ruang' => $reservasi_ruang]);
    }
    public function validasi(Reservasi_ruang $reservasi_ruang, $id)
    {
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->findOrFail($id);
        return view('reservasi_ruang.validasi_reservasi_ruangan', ['reservasi_ruang' => $reservasi_ruang]);
    }
    public function simpanValidasi(UpdateReservasi_ruangRequest $request, Reservasi_ruang $reservasi_ruang, $id)
    {
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->findOrFail($id);
        $reservasi_ruang->update($request->all());
        return redirect('/kelola-reservasi-ruang');
    }
    public function detailReservasi(Reservasi_ruang $reservasi_ruang, $id)
    {
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->findOrFail($id);
        return view('reservasi_ruang.detail_reservasi_ruangan', ['reservasi_ruang' => $reservasi_ruang]);
    }

    public function cetakReservasi(Reservasi_ruang $reservasi_ruang, $id)
    {
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->findOrFail($id);

        $data = [
            'reservasi_ruang' => $reservasi_ruang
        ];

        $html = view()->make('reservasi_ruang.cetak_bukti_reservasi_ruangan', $data)->render();

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
        $ruang = Ruang::with('gedung.lokasi', 'foto_ruang')->latest()->get();
        $reservasi_ruang = Reservasi_ruang::with('unit', 'ruang.gedung.lokasi', 'user', 'sesi', 'jenis_acara', 'periode')
            ->latest()->get();
        return view('reservasi_ruang.cekJadwal_ruangan', ['reservasi_ruang' => $reservasi_ruang, 'ruang' => $ruang]);
    }


    public function cekKesediaan(Request $request)
    {
        $startDate = $request->cek_tanggal_mulai;
        $endDate = $request->cek_tanggal_selesai;
        $sesiIds = $request->sesi_id;

        $unavailableRuangIds = Reservasi_ruang::with('sesi')
            ->whereDoesntHave('sesi', function ($query) use ($sesiIds) {
                $query->whereIn('reservasi_ruang_sesi.sesi_id', $sesiIds);
            })
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->where('tanggal_mulai', '=', $startDate)
                        ->orWhere('tanggal_selesai', '=', $endDate);
                })->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('tanggal_mulai', '>=', $startDate)
                        ->where('tanggal_selesai', '<=', $endDate);
                })->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('tanggal_mulai', '<=', $startDate)
                        ->where('tanggal_selesai', '>=', $endDate);
                });
            })
            ->where('status', '=', 'Disetujui')
            ->pluck('ruang_id');

        $availableRuangs = Ruang::with(['gedung.lokasi', 'foto_ruang'])
            ->whereNotIn('id', $unavailableRuangIds)
            ->get();

        // $availableRuangs = Ruang::with(['gedung.lokasi', 'foto_ruang'])
        //     ->whereNotIn('id', $unavailableRuangIds)
        //     ->whereHas('sesi', function ($query) use ($sesiIds) {
        //         $query->whereIn('sesi_id', $sesiIds);
        //     })
        //     ->get();
        return response()->json($availableRuangs);
    }



    public function exportReservasiRuangans()
    {
        return Excel::download(new Reservasi_ruangsExport, 'reservasi_ruangs.xlsx');
    }

    public function importReservasiRuangans(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new Reservasi_ruangsImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
