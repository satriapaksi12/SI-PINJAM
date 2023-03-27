@extends('layouts.app2')

@section('title', 'Tambah Sesi')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">TAMBAH SESI</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="sesi" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">Nama Sesi</label>
                                <input type="text" class="form-control" name="sesi"id="sesi" placeholder="">
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                <label for="gender" class="form-label">Hari</label>
                                <select class="form-control" name="hari" id="hari">
                                    <option value="">Pilih salah satu</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                        </div>

                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Jam Mulai</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="jam_mulai" id="jam_mulai"
                                        data-target="#timepicker" />
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Jam Selesai</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="jam_selesai" id="jam_selesai"
                                        data-target="#timepicker" />
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
