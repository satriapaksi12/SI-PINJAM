<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Http\Requests\StoreSesiRequest;
use App\Http\Requests\UpdateSesiRequest;
use Illuminate\Support\Facades\Session;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesi = Sesi::all();
        return view('sesi.sesi', ['sesiList' => $sesi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sesi.sesi-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSesiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSesiRequest $request)
    {
        $sesi = Sesi::create($request->all());
        if ($sesi) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambahkan');
        }

        return redirect('/sesi');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesi $sesi,$id)
    {
        $sesi = Sesi::findOrFail($id);
        return view('sesi.sesi-edit',['sesi' => $sesi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSesiRequest  $request
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
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
}
