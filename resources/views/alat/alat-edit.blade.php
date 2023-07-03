@extends('layouts.app2')

@section('title', 'Edit Alat')
@section('fitur', 'EDIT ALAT')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/alat/{{ $alat->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>No Inventaris</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="no_inventaris"id="no_inventaris"
                                                class="form-control"  value="{{ $alat->no_inventaris }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="textr"name="nama_alat"id="nama_alat"
                                                class="form-control" value="{{ $alat->nama_alat }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="gedung_id" id="gedung_id">
                                                    <option value="">{{ $alat->gedung->nama_gedung }} - {{ $alat->gedung->lokasi->nama_lokasi}}</option>
                                                    @foreach ($gedung as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_gedung }} -
                                                            {{ $item->lokasi->nama_lokasi }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Foto Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input class="form-control" type="file" name="foto_alat_id"id="foto_alat_id" multiple>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

