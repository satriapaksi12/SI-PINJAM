@extends('layouts.app')

@section('title', 'Tambah Kendaraan')

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
                        <h3 class="card-title">TAMBAH KENDARAAN</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="kendaraan" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">No Polisi </label>
                                <input type="text" class="form-control"  name="no_polisi"id="no_polisi"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">Kapasitas </label>
                                <input type="text" class="form-control"  name="kapasitas"id="kapasitas"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                            <label for="gender" class="form-label">Jenis Kendaraan</label>
                            <select class="form-control" name="jenis_kendaraan_id" id="jenis_kendaraan_id" >
                                <option value="">Pilih salah satu</option>
                                @foreach ($jenis_kendaraan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jenis_kendaraan }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                            <label for="gender" class="form-label">Lokasi</label>
                            <select class="form-control" name="gedung_id" id="gedung_id" >
                                <option value="">Pilih salah satu</option>
                                @foreach ($gedung as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_gedung }} - {{ $item->lokasi->nama_lokasi }}</option>
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
