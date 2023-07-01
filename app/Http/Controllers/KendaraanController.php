<?php

namespace App\Http\Controllers;

use App\Exports\KendaraansExport;
use App\Models\Gedung;
use App\Models\Lokasi;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\Jenis_kendaraan;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use App\Imports\KendaraansImport;

class KendaraanController extends Controller
{

    public function index()
    {
        $kendaraan = Kendaraan::with('jenis_kendaraan','gedung.lokasi')->latest()->get();
        return view('kendaraan.kendaraan', ['kendaraanList' => $kendaraan]);
    }
    public function create()
    {
        $jenis_kendaraan = Jenis_kendaraan::select('id', 'nama_jenis_kendaraan')->get();
        $gedung = Gedung::select('id', 'nama_gedung','lokasi_id')->get();
        $lokasi = Lokasi::select('id', 'nama_lokasi')->get();
        return view('kendaraan.kendaraan-add', ['gedung' => $gedung, 'lokasi' => $lokasi,'jenis_kendaraan' => $jenis_kendaraan]);
    }
    public function store(StoreKendaraanRequest $request)
    {
        $kendaraan = Kendaraan::create($request->all());
        if ($kendaraan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/kendaraan');
    }
    public function edit(Kendaraan $kendaraan,$id)
    {
        $data = [
            'kendaraan' => Kendaraan::with('jenis_kendaraan','gedung.lokasi')->findOrFail($id),
            'jenis_kendaraan' => Jenis_kendaraan::pluck('nama_jenis_kendaraan','id'),
            'gedung' => Gedung::get(),
            // 'gedung' => Gedung::pluck('id','nama_gedung','lokasi_id')->first(),
            'lokasi' => Lokasi::select('id', 'nama_lokasi')->get(),
        ];
        return view('kendaraan.kendaraan-edit', $data);
    }

    public function update(UpdateKendaraanRequest $request, Kendaraan $kendaraan,$id)
    {
        $kendaraan =Kendaraan::findOrFail($id);
        $kendaraan->update($request->all());
        if ($kendaraan) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/kendaraan');
    }

    public function destroy(Kendaraan $kendaraan,$id)
    {
        $deletedKendaraan = Kendaraan::findORFail($id);
        $deletedKendaraan->delete();

        if ($deletedKendaraan) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/kendaraan');
    }
    public function exportKendaraans()
    {
        return Excel::download(new KendaraansExport, 'kendaraans.xlsx');
    }
    public function importKendaraans(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new KendaraansImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
