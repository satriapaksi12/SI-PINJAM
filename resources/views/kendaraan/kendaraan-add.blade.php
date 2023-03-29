@extends('layouts.app2')

@section('title', 'Tambah Kendaraan')
@section('fitur', 'TAMBAH KENDARAAN')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="kendaraan" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>No Polisi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="no_polisi"id="no_polisi"
                                                class="form-control" placeholder="No Polisi">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kapasitas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number"name="kapasitas"id="kapasitas"
                                                class="form-control" placeholder="Kapasitas">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Jenis Kendaraan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="jenis_kendaraan_id"
                                                    id="jenis_kendaraan_id">
                                                    @foreach ($jenis_kendaraan as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->nama_jenis_kendaraan }}</option>
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
                                                        <option value="{{ $item->id }}">{{ $item->nama_gedung }} -
                                                            {{ $item->lokasi->nama_lokasi }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
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

