@extends('layouts.app2')

@section('title', 'Tambah Alat')
@section('fitur', 'TAMBAH ALAT')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="alat" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>No Inventaris</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="no_polisi"id="no_polisi"
                                                class="form-control" placeholder="No Polisi">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number"name="kapasitas"id="kapasitas"
                                                class="form-control" placeholder="Kapasitas">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="gedung_id" id="gedung_id">
                                                    @foreach ($gedung as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_gedung }} -
                                                            {{ $item->lokasi->nama_lokasi }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <input class="form-control" type="file" id="formFile">
                                        <div class="col-md-4">
                                            <label>Foto Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input class="form-control" type="file" name="foto_alat_id"id="foto_alat_id">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
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

