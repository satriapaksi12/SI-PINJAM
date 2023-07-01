<?php

namespace App\Http\Controllers;

use App\Exports\SesisExport;
use App\Models\Sesi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreSesiRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateSesiRequest;
use App\Imports\SesisImport;

class SesiController extends Controller
{

    public function index()
    {
        $sesi = Sesi::all();
        return view('sesi.sesi', ['sesiList' => $sesi]);
    }
    public function create()
    {
        return view('sesi.sesi-add');
    }
    public function store(StoreSesiRequest $request)
    {
        $sesi = Sesi::create($request->all());
        if ($sesi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/sesi');
    }
    public function edit(Sesi $sesi,$id)
    {
        $sesi = Sesi::findOrFail($id);
        return view('sesi.sesi-edit',['sesi' => $sesi]);
    }
    public function update(UpdateSesiRequest $request, Sesi $sesi,$id)
    {
        $sesi =Sesi::findOrFail($id);
        $sesi->update($request->all());
        if ($sesi) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/sesi');
    }
    public function destroy(Sesi $sesi,$id)
    {
        $deletedSesi = Sesi::findORFail($id);
        $deletedSesi->delete();
        if ($deletedSesi) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/sesi');
    }
    public function exportSesis()
    {
        return Excel::download(new SesisExport, 'sesis.xlsx');
    }
    public function importSesis(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new SesisImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
