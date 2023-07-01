<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Exports\LokasisExport;
use App\Imports\LokasisImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;

class LokasiController extends Controller
{

    public function index()
    {
        $lokasi = Lokasi::all();
        return view('lokasi.lokasi', ['lokasiList' => $lokasi]);
    }
    public function create()
    {
        return view('lokasi.lokasi-add');
    }
    public function store(StoreLokasiRequest $request)
    {
        $lokasi = Lokasi::create($request->all());
        if ($lokasi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }

        return redirect('/lokasi');
    }
    public function edit(Lokasi $lokasi, $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('lokasi.lokasi-edit', ['lokasi' => $lokasi]);
    }
    public function update(UpdateLokasiRequest $request, Lokasi $lokasi, $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->all());
        if ($lokasi) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/lokasi');
    }
    public function destroy(Lokasi $lokasi, $id)
    {
        $deletedLokasi = Lokasi::findORFail($id);
        $deletedLokasi->delete();

        if ($deletedLokasi) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/lokasi');
    }
    public function exportLokasis()
    {
        return Excel::download(new LokasisExport, 'lokasis.xlsx');
    }

    public function importLokasis(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new LokasisImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
