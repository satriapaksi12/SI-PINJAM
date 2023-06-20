<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Exports\UnitsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreUnitRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUnitRequest;
use App\Imports\UnitsImport;

class UnitController extends Controller
{

    public function index()
    {
        $unit = Unit::all();
        return view('unit.unit', ['unitList' => $unit]);
    }

    public function create()
    {
        return view('unit.unit-add');
    }

    public function store(StoreUnitRequest $request)
    {
        $unit = Unit::create($request->all());
        if ($unit) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }

        return redirect('/unit');
    }

    public function edit(Unit $unit, $id)
    {
        $unit = Unit::findOrFail($id);
        return view('unit.unit-edit',['unit' => $unit]);
    }

    public function update(UpdateUnitRequest $request, Unit $unit,$id)
    {
        $unit = Unit::findOrFail($id);
        $unit->update($request->all());
        if ($unit) {
            Session::flash('status-edit', 'success');
            Session::flash('message-edit', 'Data berhasil diedit');
        }
        return redirect('/unit');
    }

    public function destroy(Unit $unit,$id)
    {
        $deletedUnit = Unit::findORFail($id);
        $deletedUnit->delete();
        if ($deletedUnit) {
            Session::flash('status-delete', 'success');
            Session::flash('message-delete', 'Data berhasil dihapus');
        }
        return redirect('/unit');
    }
    public function exportUnits()
    {
        return Excel::download(new UnitsExport, 'units.xlsx');
    }

    public function importUnits(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new UnitsImport, $file);
        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
