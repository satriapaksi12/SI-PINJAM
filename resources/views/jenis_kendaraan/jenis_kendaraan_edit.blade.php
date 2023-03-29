@extends('layouts.app2')

@section('title', 'Edit Jenis Kendaraan')
@section('fitur', 'EDIT JENIS KENDARAAN ')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/jenis_kendaraan/{{ $jenis_kendaraan->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Jenis Kendaraan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="nama_jenis_kendaraan"id="nama_jenis_kendaraan"
                                            value="{{ $jenis_kendaraan->nama_jenis_kendaraan }}" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
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
