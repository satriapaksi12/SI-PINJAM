@extends('layouts.app2')

@section('title', 'Validasi Reservasi Alat')
@section('fitur', 'VALIDASI RESERVASI ALAT')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/validasi-reservasi-alat/{{ $reservasi_alat->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nomor Reservasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <b><input type="text"name="no_reservasi"id="no_reservasi" class="form-control"
                                                value="{{ $reservasi_alat->no_reservasi }}" readonly></b>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="nama_alat"id="nama_alat" class="form-control"
                                                value="{{ $reservasi_alat->alat->nama_alat }}" readonly>
                                            <input type="text"name="alat_id"id="alat_id" class="form-control"
                                                value="{{ $reservasi_alat->alat->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Inventaris</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="no_inventaris" id="no_inventaris"
                                                class="form-control" value="{{ $reservasi_alat->alat->no_inventaris }}"
                                                readonly>
                                            <input type="text"name="alat_id"id="alat_id" class="form-control"
                                                value="{{ $reservasi_alat->alat->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="gedung_id"id="gedung_id" class="form-control"
                                                value="{{ $reservasi_alat->alat->gedung->nama_gedung }} - {{ $reservasi_alat->alat->gedung->lokasi->nama_lokasi }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Peminjam</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="user_id"id="user_id" class="form-control"
                                                value="{{ Auth::user()->nama }}"readonly>
                                            <input type="text"name="user_id"id="user_id" class="form-control"
                                                value="{{ Auth::user()->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="penanggung_jawab"id="penanggung_jawab"
                                                class="form-control"
                                                value="{{ $reservasi_alat->penanggung_jawab }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Telepon Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="no_telepon"id="no_telepon"
                                                class="form-control"
                                                value="{{ $reservasi_alat->no_telepon }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="unit_id"id="unit_id" class="form-control"
                                                value="{{ $reservasi_alat->unit->nama_unit }}" readonly>
                                            <input type="text"name="unit_id"id="unit_id" class="form-control"
                                                value="{{ $reservasi_alat->unit->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="kegiatan"id="kegiatan" class="form-control"
                                                value="{{ $reservasi_alat->kegiatan }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_mulai"id="tanggal_mulai"
                                                class="form-control" value="{{ $reservasi_alat->tanggal_mulai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_selesai"id="tanggal_selesai"
                                                class="form-control" value="{{ $reservasi_alat->tanggal_selesai }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="time" name="jam_mulai"id="jam_mulai" class="form-control"
                                                value="{{ $reservasi_alat->jam_mulai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="time" name="jam_selesai"id="jam_selesai"
                                                class="form-control" value="{{ $reservasi_alat->jam_selesai }}" readonly>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <label>Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <a href="{{ $reservasi_alat->surat }}">Link Surat</a>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="status" id="status">
                                                    <option value="">Pilih salah satu</option>
                                                    <option value="disetujui">Disetujui</option>
                                                    <option value="ditolak">Ditolak</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Alasan Penolakan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="alasan"id="alasan" class="form-control"></textarea>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Validasi</button>
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