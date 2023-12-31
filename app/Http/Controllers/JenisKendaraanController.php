<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_kendaraan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Jenis_kendaraansExport;
use App\Imports\Jenis_kendaraansImport;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreJenis_kendaraanRequest;
use App\Http\Requests\UpdateJenis_kendaraanRequest;

class JenisKendaraanController extends Controller
{

    public function index()
    {
        $jenis_kendaraan = Jenis_kendaraan::latest()->get();
        return view('jenis_kendaraan.jenis_kendaraan', ['jeniskendaraanList' => $jenis_kendaraan]);
    }
    public function create()
    {
        return view('jenis_kendaraan.jenis_kendaraan_add');
    }
    public function store(StoreJenis_kendaraanRequest $request)
    {
        $jenis_kendaraan = Jenis_kendaraan::create($request->all());
        if ($jenis_kendaraan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/jenis_kendaraan');
    }
    public function edit(Jenis_kendaraan $jenis_kendaraan,$id)
    {
        $jenis_kendaraan = Jenis_kendaraan::findOrFail($id);
        return view('jenis_kendaraan.jenis_kendaraan_edit',['jenis_kendaraan' => $jenis_kendaraan]);
    }
    public function update(UpdateJenis_kendaraanRequest $request, Jenis_kendaraan $jenis_kendaraan,$id)
    {
        $jenis_kendaraan = Jenis_kendaraan::findOrFail($id);
        $jenis_kendaraan->update( $request->all());

        if ($jenis_kendaraan) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/jenis_kendaraan');
    }
    public function destroy(Jenis_kendaraan $jenis_kendaraan,$id)
    {
        $deletedJeniskendaraan = Jenis_kendaraan::findORFail($id);
        $deletedJeniskendaraan->delete();

        if ($deletedJeniskendaraan) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/jenis_kendaraan');
    }
    public function exportJenisKendaraans()
    {
        return Excel::download(new Jenis_kendaraansExport, 'jenis_kendaraans.xlsx');
    }
    public function importJenisKendaraans(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new Jenis_kendaraansImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
