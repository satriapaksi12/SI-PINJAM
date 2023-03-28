@extends('layouts.app2')

@section('title', 'Tambah Gedung')
@section('fitur', 'TAMBAH GEDUNG')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form action="gedung" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Gedung</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="nama_gedung"id="nama_gedung" class="form-control"
                                                placeholder="Nama Gedung">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi Kampus</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select"name="lokasi_id" id="lokasi_id">
                                                    @foreach ($lokasi as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_lokasi }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>


                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
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

