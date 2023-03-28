<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Http\Requests\StorePeriodeRequest;
use App\Http\Requests\UpdatePeriodeRequest;
use Illuminate\Support\Facades\Session;


class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::all();
        return view('periode.periode', ['periodeList' => $periode]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periode.periode-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodeRequest $request)
    {
        $periode = Periode::create($request->all());
        if ($periode) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }

        return redirect('/periode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Periode $periode_edit,$id)
    {
        $periode_edit = Periode::findOrFail($id);
        return view('periode.periode-edit',['periode' => $periode_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodeRequest  $request
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
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
}
