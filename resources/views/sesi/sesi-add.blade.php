@extends('layouts.app2')

@section('title', 'Tambah Sesi')
@section('fitur', 'TAMBAH SESI ')

@section('content')

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form action="sesi" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Sesi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="sesi"id="sesi" class="form-control"
                                                placeholder="Nama Sesi">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Hari</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="hari" id="hari">
                                                    <option value="Senin">Senin</option>
                                                    <option value="Selasa">Selasa</option>
                                                    <option value="Rabu">Rabu</option>
                                                    <option value="Kamis">Kamis</option>
                                                    <option value="Jumat">Jumat</option>
                                                    <option value="Sabtu">Sabtu</option>
                                                    <option value="Minggu">Minggu</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control"
                                                placeholder="Jam Mulai">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control"
                                                placeholder="Jam Selesai">
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
