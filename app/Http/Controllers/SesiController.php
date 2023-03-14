<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Http\Requests\StoreSesiRequest;
use App\Http\Requests\UpdateSesiRequest;

class SesiController extends Controller
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
     * @param  \App\Http\Requests\StoreSesiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSesiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function show(Sesi $sesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesi $sesi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSesiRequest  $request
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSesiRequest $request, Sesi $sesi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesi $sesi)
    {
        //
    }
}
