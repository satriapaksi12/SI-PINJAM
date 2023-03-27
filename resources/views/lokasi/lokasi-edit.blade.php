@extends('layouts.app2')

@section('title', 'Superadmin|Edit Lokasi')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">EDIT LOKASI</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/lokasi/{{ $lokasi->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">Nama Lokasi Kampus</label>
                                <input type="text" class="form-control" name="nama_lokasi"id="nama_lokasi"
                                    value="{{ $lokasi->nama_lokasi }}" placeholder="">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
