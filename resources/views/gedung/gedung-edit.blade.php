@extends('layouts.app')

@section('title', 'Edit Periode')

@include('component.navbar')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-3">
                @include('component.sidebar')
            </div>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">EDIT GEDUNG</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/gedung/{{ $gedung->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">Nama Gedung</label>
                                <input type="text" class="form-control" name="nama_gedung"id="nama_gedung" value="{{ $gedung->nama_gedung }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                <label for="gender" class="form-label">Lokasi Kampus</label>
                                <select class="form-control" name="nama_lokasi" id="lokasi_id">
                                    <option value="{{ $lokasi->nama_lokasi }}">{{ $lokasi->nama_lokasi }}</option>
                                    @foreach ($lokasi as $data )
                                    <option value="{{ $lokasi->nama_lokasi }}">{{ $lokasi->nama_lokasi }}</option>
                                    @endforeach
                                </select>
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
