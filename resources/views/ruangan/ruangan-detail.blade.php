@extends('layouts.app2')

@section('title', 'Detail Ruangan')
@section('fitur', 'DETAIL RUANGAN')

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
                                            <label>Nama Ruangan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="nama_ruang" id="nama_ruang"
                                                class="form-control"  value="{{ $ruang->nama_ruang }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kapasitas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="kapasitas"id="kapasitas"
                                                class="form-control"  value="{{ $ruang->kapasitas }}" readonly >
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="gedung_id"id="gedung_id"
                                                class="form-control" value="{{ $ruang->gedung->nama_gedung }} - {{ $ruang->gedung->lokasi->nama_lokasi}}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Fasilitas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="fasilitas"id="fasilitas" class="form-control" readonly>{{ $ruang->fasilitas }}</textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Foto Ruangan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <img src="{{ asset($ruang->foto_ruang[0]->nama_foto) }}" alt="">
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

