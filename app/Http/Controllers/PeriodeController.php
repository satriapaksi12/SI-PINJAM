<?php

namespace App\Http\Controllers;

use App\Exports\PeriodesExport;
use App\Models\Periode;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorePeriodeRequest;
use App\Http\Requests\UpdatePeriodeRequest;
use App\Imports\PeriodesImport;

class PeriodeController extends Controller
{

    public function index()
    {
        $periode = Periode::latest()->get();
        return view('periode.periode', ['periodeList' => $periode]);
    }
    public function create()
    {
        return view('periode.periode-add');
    }
    public function store(StorePeriodeRequest $request)
    {
        $periode = Periode::create($request->all());
        if ($periode) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }
        return redirect('/periode');
    }
    public function edit(Periode $periode_edit,$id)
    {
        $periode_edit = Periode::findOrFail($id);
        return view('periode.periode-edit',['periode' => $periode_edit]);
    }
    public function update(UpdatePeriodeRequest $request, Periode $periode,$id)
    {
        $periode =Periode::findOrFail($id);
        $periode->update($request->all());
        if ($periode) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/periode');
    }
    public function destroy(Periode $periode,$id)
    {
        $deletedPeriode = Periode::findORFail($id);
        $deletedPeriode->delete();

        if ($periode) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/periode');
    }
    public function exportPeriodes()
    {
        return Excel::download(new PeriodesExport, 'periodes.xlsx');
    }
    public function importPeriodes(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PeriodesImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
