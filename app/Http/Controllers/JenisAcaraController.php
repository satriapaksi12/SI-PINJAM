<?php

namespace App\Http\Controllers;

use App\Exports\Jenis_acarasExport;
use App\Models\Jenis_acara;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreJenis_acaraRequest;
use App\Http\Requests\UpdateJenis_acaraRequest;
use App\Imports\Jenis_acarasImport;

class JenisAcaraController extends Controller
{
    public function index()
    {
        $jenis_acara = Jenis_acara::all();
        return view('jenis_acara.jenis_acara', ['jenisacaraList' => $jenis_acara]);
    }
    public function create()
    {
        return view('jenis_acara.jenis_acara_add');
    }
    public function store(StoreJenis_acaraRequest $request)
    {
        $jenis_acara = Jenis_acara::create($request->all());
        if ($jenis_acara) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/jenis_acara');
    }
    public function edit(Jenis_acara $jenis_acara,$id)
    {
        $jenis_acara = Jenis_acara::findOrFail($id);
        return view('jenis_acara.jenis_acara_edit',['jenis_acara' => $jenis_acara]);
    }
    public function update(UpdateJenis_acaraRequest $request, Jenis_acara $jenis_acara,$id)
    {
        $jenis_acara = Jenis_acara::findOrFail($id);

        $jenis_acara->update( $request->all());

        if ($jenis_acara) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/jenis_acara');
    }
    public function destroy(Jenis_acara $jenis_acara,$id)
    {
        $deletedJenisacara = Jenis_acara::findORFail($id);
        $deletedJenisacara->delete();
        if ($deletedJenisacara) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/jenis_acara');
    }
    public function exportJenisAcaras()
    {
        return Excel::download(new Jenis_acarasExport, 'jenis_acaras.xlsx');
    }

    public function importJenisAcaras(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new Jenis_acarasImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
