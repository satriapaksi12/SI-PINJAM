@extends('layouts.app2')

@section('title', 'Edit Kendaraan')
@section('fitur', 'EDIT KENDARAAN')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/kendaraan/{{ $kendaraan->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>No Polisi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="no_polisi"id="no_polisi" class="form-control"
                                                value="{{ $kendaraan->no_polisi }}" placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kapasitas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number"name="kapasitas"id="kapasitas" class="form-control"
                                                value="{{ $kendaraan->kapasitas }}" placeholder="">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Jenis Kendaraan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="jenis_kendaraan_id"
                                                    id="jenis_kendaraan_id">
                                                    @foreach ($jenis_kendaraan as $id => $name)
                                                        <option value="{{ $id }}"
                                                            {{ $kendaraan->jenis_kendaraan_id == $id ? 'selected' : '' }}>
                                                            {{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="gedung_id" id="gedung_id">
                                                    @foreach ($gedung as $item)
                                                    <option value="{{ $item->id }}"
                                                    {{ $kendaraan->gedung_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->nama_gedung }} - {{  $item->lokasi->nama_lokasi }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
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






