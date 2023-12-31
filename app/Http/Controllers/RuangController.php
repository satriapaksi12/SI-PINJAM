<?php

namespace App\Http\Controllers;

use App\Exports\RuangsExport;
use App\Models\Ruang;
use App\Models\Gedung;
use App\Models\Lokasi;
use App\Models\Foto_ruang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreRuangRequest;
use App\Http\Requests\UpdateRuangRequest;
use App\Imports\RuangsImport;

class RuangController extends Controller
{

    public function index()
    {
        $ruang = Ruang::with('gedung.lokasi', 'foto_ruang')->latest()->get();
        return view('ruangan.ruangan', ['ruang' => $ruang]);
    }
    public function create()
    {
        $foto_ruang = Foto_ruang::select('id', 'nama_foto')->get();
        $gedung = Gedung::select('id', 'nama_gedung', 'lokasi_id')->get();
        $lokasi = Lokasi::select('id', 'nama_lokasi')->get();
        return view('ruangan.ruangan-add', ['gedung' => $gedung, 'lokasi' => $lokasi, 'foto_ruang' => $foto_ruang]);
    }
    public function store(StoreRuangRequest $request)
    {
        $foto = $request->foto_ruang_id;
        $name = $foto->hashName();
        $foto->move(public_path('/img/'), $name);
        $namaFoto = 'img/' . $name;
        Foto_ruang::create([
            'nama_foto' => $namaFoto,
        ]);
        $foto = Foto_ruang::where('nama_foto', $namaFoto)->first();
        $ruang = new Ruang();
        $ruang->no_ruang = $request->no_ruang;
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->kapasitas = $request->kapasitas;
        $ruang->fasilitas = $request->fasilitas;
        $ruang->foto_ruang_id = $foto->id;
        $ruang->gedung_id = $request->gedung_id;
        $ruang->save();

        if ($ruang) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/ruang');
    }
    public function show(Ruang $ruang, $id)
    {
        $ruang = Ruang::with('gedung.lokasi', 'foto_ruang')->findOrFail($id);
        return view('ruangan.ruangan-detail', ['ruang' => $ruang]);
    }
    public function edit(Ruang $ruang, $id)
    {
        $data = [
            'ruang' => Ruang::with('foto_ruang', 'gedung.lokasi')->findOrFail($id),
            'foto_ruang' => Foto_ruang::pluck('nama_foto', 'id'),
            'gedung' => Gedung::get(),
            'lokasi' => Lokasi::select('id', 'nama_lokasi')->get(),
        ];
        return view('ruangan.ruangan-edit', $data);
    }
    public function update(UpdateRuangRequest $request, Ruang $ruang, $id)
    {
        $ruang = Ruang::findOrFail($id);
        $oldData = Foto_ruang::where('id', $ruang->foto_ruang_id)->first();
        $path = "";
        if ($request->foto_ruang_id != null) {
            if ($oldData != null) {
                if (file_exists($oldData)) {
                    unlink(public_path($oldData));
                }
            }
            $foto = $request->file('foto_ruang_id');
            $name = $foto->hashName();
            $path = 'img/' . $name;
            $foto->move(public_path('img/'), $name);
        }
        if ($path != "") {
            $oldData->update([
                'nama_foto' => $path
            ]);
        }
        $ruang->update($request->except('foto_ruang_id'));
        if ($ruang) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/ruang');
    }
    public function destroy(Ruang $ruang, $id)
    {
        $deletedRuang = Ruang::findORFail($id);
        $deletedRuang->delete();

        if ($deletedRuang) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/ruang');
    }
    public function exportRuangs()
    {
        return Excel::download(new RuangsExport, 'ruangs.xlsx');
    }
    public function importRuangs(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new RuangsImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
