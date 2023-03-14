<?php

namespace App\Http\Controllers;

use App\Models\Foto_alat;
use App\Http\Requests\StoreFoto_alatRequest;
use App\Http\Requests\UpdateFoto_alatRequest;

class FotoAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFoto_alatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoto_alatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto_alat  $foto_alat
     * @return \Illuminate\Http\Response
     */
    public function show(Foto_alat $foto_alat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto_alat  $foto_alat
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto_alat $foto_alat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoto_alatRequest  $request
     * @param  \App\Models\Foto_alat  $foto_alat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoto_alatRequest $request, Foto_alat $foto_alat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto_alat  $foto_alat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto_alat $foto_alat)
    {
        //
    }
}
