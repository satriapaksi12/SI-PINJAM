<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Exports\GedungsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreGedungRequest;

use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateGedungRequest;
use App\Http\Requests\UpdateLokasiRequest;
use App\Imports\GedungsImport;

class GedungController extends Controller
{

    public function index()
    {
        $gedung = Gedung::with('lokasi')->latest()->get();
        return view('gedung.gedung', ['gedungList' => $gedung]);
    }
    public function create()
    {
        $gedung = Gedung::select('id', 'nama_gedung')->get();
        $lokasi = Lokasi::select('id', 'nama_lokasi')->get();
        return view('gedung.gedung-add', ['gedung' => $gedung, 'lokasi' => $lokasi]);
    }
    public function store(StoreGedungRequest $request)
    {
        $gedung = Gedung::create($request->all());
        if ($gedung) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/gedung');
    }
    public function edit(Gedung $gedung ,Lokasi $lokasi,$id)
    {
        $gedung = Gedung::with('lokasi')->findOrFail($id);
        $lokasi =Lokasi::select('id', 'nama_lokasi')->where('id', '!=', $gedung->lokasi_id)->get();
        return view('gedung.gedung-edit', ['gedung' => $gedung,'lokasi' => $lokasi]);
    }
    public function update(UpdateGedungRequest $request, Gedung $gedung,$id)
    {
        // dd($request->all());
        $gedung =Gedung::findOrFail($id);
        $gedung->update($request->all());

        if ($gedung) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/gedung');
    }
    public function destroy(Gedung $gedung,$id)
    {
        $deletedGedung = Gedung::findORFail($id);
        $deletedGedung->delete();

        if ($deletedGedung) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/gedung');
    }
    public function exportGedungs()
    {
        return Excel::download(new GedungsExport, 'gedungs.xlsx');
    }

    public function importGedungs(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new GedungsImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
