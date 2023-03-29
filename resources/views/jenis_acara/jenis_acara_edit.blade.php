@extends('layouts.app2')

@section('title', 'Edit Jenis Acara')
@section('fitur', 'EDIT JENIS ACARA ')

@section('content')
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="/jenis_acara/{{ $jenis_acara->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama Jenis Acara</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text"   name="nama_jenis_acara"id="nama_jenis_acara" class="form-control"
                                        value="{{ $jenis_acara->nama_jenis_acara }}" placeholder="">
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
