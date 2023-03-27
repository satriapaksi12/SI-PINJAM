@extends('layouts.app2')

@section('title', 'Tambah Gedung')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">TAMBAH GEDUNG</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="gedung" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">Nama Gedung</label>
                                <input type="text" class="form-control"  name="nama_gedung"id="nama_gedung"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                            <label for="gender" class="form-label">Lokasi Kampus</label>
                            <select class="form-control" name="lokasi_id" id="lokasi_id" >
                                <option value="">Pilih salah satu</option>
                                @foreach ($lokasi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_lokasi }}</option>
                                @endforeach
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
