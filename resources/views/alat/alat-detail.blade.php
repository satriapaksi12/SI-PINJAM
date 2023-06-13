@extends('layouts.app2')

@section('title', 'Detail Alat')
@section('fitur', 'DETAIL ALAT')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>No Inventaris</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="no_inventaris" id="no_inventaris"
                                                class="form-control"  value="{{ $alat->no_inventaris }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="nama_alat"id="nama_alat"
                                                class="form-control"  value="{{ $alat->nama_alat }}" readonly >
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="gedung_id"id="gedung_id"
                                                class="form-control" value="{{ $alat->gedung->nama_gedung }} - {{ $alat->gedung->lokasi->nama_lokasi}}" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Foto Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <img src="{{ asset($alat->foto_alat[0]->nama_foto) }}" alt="">
                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

