@extends('layouts.app')

@section('title', 'Edit Kemdaraan')

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
                        <h3 class="card-title">EDIT KENDARAAN</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/kendaraan/{{ $kendaraan->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">No Polisi </label>
                                <input type="text" class="form-control"  name="no_polisi"id="no_polisi" value="{{ $kendaraan->no_polisi }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">Kapasitas </label>
                                <input type="text" class="form-control"  name="kapasitas"id="kapasitas" value="{{ $kendaraan -> kapasitas }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                            <label for="gender" class="form-label">Jenis Kendaraan</label>
                            <select class="form-control" name="jenis_kendaraan_id" id="jenis_kendaraan_id" >
                                <option value="{{ $kendaraan->jenis_kendaraan->id }}">{{  $kendaraan->jenis_kendaraan->nama_jenis_kendaraan }}</option>
                                @foreach ($kendaraan -> jenis_kendaraan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jenis_kendaraan }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                            <label for="gender" class="form-label">Lokasi</label>
                            <select class="form-control" name="gedung_id" id="gedung_id" >
                                <option value="{{ $kendaraan->$gedung->id }}">{{  $kendaraan->gedung->nama_gedung }} - {{  $kendaraan->gedung->lokasi->nama_lokasi }}</option>
                                @foreach ($kendaraan->gedung as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_gedung }} - {{ $item->lokasi->nama_lokasi }}</option>
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
