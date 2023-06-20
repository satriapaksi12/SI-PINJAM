<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Gedung;
use App\Models\Lokasi;
use App\Models\Foto_alat;
use App\Exports\AlatsExport;
use App\Imports\AlatsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreAlatRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateAlatRequest;


class AlatController extends Controller
{

    public function index()
    {
        $alat = Alat::with('gedung.lokasi','foto_alat')->latest()->get();
        return view('alat.alat', ['alat' => $alat]);
    }
    public function create()
    {
        $foto_alat = Foto_alat::select('id', 'nama_foto')->get();
        $gedung = Gedung::select('id', 'nama_gedung','lokasi_id')->get();
        $lokasi = Lokasi::select('id', 'nama_lokasi')->get();
        return view('alat.alat-add', ['gedung' => $gedung, 'lokasi' => $lokasi,'foto_alat' => $foto_alat]);
    }
    public function store(StoreAlatRequest $request)
    {

        $foto = $request->foto_alat_id;
        $name = $foto->hashName();
        $foto->move(public_path('/img/'), $name);
        $namaFoto = 'img/' . $name;
        Foto_alat::create([
            'nama_foto' => $namaFoto,
        ]);
        $foto = Foto_alat::where('nama_foto', $namaFoto)->first();
        $alat = new Alat();
        $alat->no_inventaris = $request->no_inventaris;
        $alat->nama_alat = $request->nama_alat;
        $alat->foto_alat_id = $foto->id;
        $alat->gedung_id = $request->gedung_id;
        $alat->save();
        if ($alat) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/alat');
    }
    public function show(Alat $alat,$id)
    {
        $alat = Alat::with('gedung.lokasi','foto_alat')->findOrFail($id);
        return view('alat.alat-detail', ['alat' => $alat]);
    }
    public function edit(Alat $alat,$id)
    {
        $data = [
            'alat' => Alat::with('foto_alat','gedung.lokasi')->findOrFail($id),
            'foto_alat' => Foto_alat::pluck('nama_foto','id'),
            'gedung' => Gedung::get(),
            'lokasi' => Lokasi::select('id', 'nama_lokasi')->get(),
        ];
        return view('alat.alat-edit', $data);
    }
    public function update(UpdateAlatRequest $request, Alat $alat,$id)
    {
        $alat =Alat::findOrFail($id);
        $alat->update($request->all());
        if ($alat) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/alat');
    }
    public function destroy(Alat $alat,$id)
    {
        $deletedAlat = Alat::findORFail($id);
        $deletedAlat->delete();
        if ($deletedAlat) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/alat');
    }
    public function exportAlats()
    {
        return Excel::download(new AlatsExport, 'alats.xlsx');
    }
    public function importAlats(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new AlatsImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
