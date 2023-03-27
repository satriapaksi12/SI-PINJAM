@extends('layouts.app2')

@section('title', 'Tambah Periode')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">TAMBAH PERIODE</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="periode" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">Tahun Periode</label>
                                <input type="text" class="form-control"  name="tahun_periode"id="tahun_periode"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                            <label for="gender" class="form-label">Semester</label>
                            <select class="form-control" name="semester" id="semester" >
                                <option value="">Pilih salah satu</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
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
