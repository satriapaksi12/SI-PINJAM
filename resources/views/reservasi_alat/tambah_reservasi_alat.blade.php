@extends('layouts.app2')

@section('title', 'Tambah Reservasi Alat')
@section('fitur', 'TAMBAH RESERVASI ALAT')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/reservasi-alat" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        {{-- <div class="col-md-4">
                                            <label>Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="nama_alat"id="nama_alat" class="form-control"
                                                value="{{ $alat->nama_alat }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Inventaris</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="no_inventaris" id="no_inventaris"
                                                class="form-control" value="{{ $alat->no_inventaris }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="gedung_id"id="gedung_id" class="form-control"
                                                value="{{ $alat->gedung->nama_gedung }} - {{ $alat->gedung->lokasi->nama_lokasi }}"
                                                readonly>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <label>Peminjam</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                                <input type="text" name="user_id"id="user_id" class="form-control"
                                                    value="{{ Auth::user()->nama }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="penanggung_jawab"id="penanggung_jawab"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Telepon Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="no_telepon"id="no_telepon" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="unit_id" id="unit_id">
                                                    @foreach ($unit as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_unit }} </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="kegiatan"id="kegiatan" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_mulai"id="tanggal_mulai"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_selesai"id="tanggal_selesai"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="time" name="jam_mulai"id="jam_mulai" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="time" name="jam_selesai"id="jam_selesai" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Surat Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input class="form-control" type="file" name="surat" id="surat">
                                        </div>
                                        {{-- untuk menyimpan data ke database --}}

                                        <div class="col-md-4">
                                            <label>Daftar ALat </label>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">No Inventaris</th>
                                                    <th scope="col">Nama Alat</th>
                                                    <th scope="col">Lokasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($alat as $index => $a)
                                                <input type="hidden" name="alat_id[]" value="{{ $a->id }}">
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $a->no_inventaris }}</td>
                                                    <td>{{ $a->nama_alat }}</td>
                                                    <td>{{ $a->gedung->nama_gedung }} - {{ $a->gedung->lokasi->nama_lokasi }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
