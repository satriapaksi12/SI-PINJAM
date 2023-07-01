@extends('layouts.app2')

@section('title', 'Detail Reservasi Kendaraan')
@section('fitur', 'DETAIL RESERVASI KENDARAAN')

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
                                            <label>Nomor Reservasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <b><input type="text"name="no_reservasi"id="no_reservasi" class="form-control"
                                                value="{{ $reservasi_kendaraan->no_reservasi }}" readonly></b>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Polisi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="no_polisi"id="no_polisi" class="form-control"
                                                value="{{ $reservasi_kendaraan->kendaraan->no_polisi }}" readonly>
                                            <input type="text"name="kendaraan_id"id="kendaraan_id" class="form-control"
                                                value="{{ $reservasi_kendaraan->kendaraan->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jenis Kendaraan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="jenis_kendaraan_id" id="jenis_kendaraan_id"
                                                class="form-control"
                                                value="{{ $reservasi_kendaraan->kendaraan->jenis_kendaraan->nama_jenis_kendaraan }}" readonly>
                                            <input type="text"name="jenis_kendaraan_id"id="jenis_kendaraan_id"
                                                class="form-control" value="{{  $reservasi_kendaraan->kendaraan->jenis_kendaraan->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="gedung_id"id="gedung_id" class="form-control"
                                                value="{{ $reservasi_kendaraan->kendaraan->gedung->nama_gedung }} - {{ $reservasi_kendaraan->kendaraan->gedung->lokasi->nama_lokasi }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Peminjam</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="user_id"id="user_id" class="form-control"
                                                value="{{ $reservasi_kendaraan->user->nama }}"readonly>
                                            <input type="text"name="user_id"id="user_id" class="form-control"
                                                value="{{ $reservasi_kendaraan->user->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="penanggung_jawab"id="penanggung_jawab"
                                                class="form-control"
                                                value="{{ $reservasi_kendaraan->penanggung_jawab }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Telepon Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="no_telepon"id="no_telepon"
                                                class="form-control"
                                                value="{{ $reservasi_kendaraan->no_telepon }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="unit_id"id="unit_id" class="form-control"
                                                value="{{ $reservasi_kendaraan->unit->nama_unit }}" readonly>
                                            <input type="text"name="unit_id"id="unit_id" class="form-control"
                                                value="{{ $reservasi_kendaraan->unit->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="kegiatan"id="kegiatan" class="form-control"
                                                value="{{ $reservasi_kendaraan->kegiatan }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="date" name="tanggal_mulai"id="tanggal_mulai"
                                                class="form-control" value="{{ $reservasi_kendaraan->tanggal_mulai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="date" name="tanggal_selesai"id="tanggal_selesai"
                                                class="form-control" value="{{ $reservasi_kendaraan->tanggal_selesai }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="time" name="jam_mulai"id="jam_mulai" class="form-control"
                                                value="{{ $reservasi_kendaraan->jam_mulai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="time" name="jam_selesai"id="jam_selesai"
                                                class="form-control" value="{{ $reservasi_kendaraan->jam_selesai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <a href="{{ asset($reservasi_kendaraan->surat) }}" target="_blank" class="btn icon icon-left btn-info"><i data-feather="file"></i>Lihat Surat</a>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="status"id="status"
                                            class="form-control" value="{{ $reservasi_kendaraan->status }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Alasan Penolakan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="status"id="status"
                                            class="form-control" value="{{ $reservasi_kendaraan->alasan }}" readonly>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <a href="/detail-reservasi-kendaraan-cetak/{{$reservasi_kendaraan->id}}"><button type="submit" class="btn btn-primary me-1 mb-1">Cetak Bukti Reservasi</button></a>
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
