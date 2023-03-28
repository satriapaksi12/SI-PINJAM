@extends('layouts.app2')

@section('title', 'Edit Gedung')
@section('fitur', 'EDIT GEDUNG')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form action="/gedung/{{ $gedung->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Gedung</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="nama_gedung"id="nama_gedung" class="form-control"
                                                value="{{ $gedung->nama_gedung }}" placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi Kampus</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select"name="lokasi_id" id="lokasi_id">
                                                    <option value="{{ $gedung->lokasi->id }}">
                                                        {{ $gedung->lokasi->nama_lokasi }}</option>
                                                    @foreach ($lokasi as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama_lokasi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
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








