@extends('layouts.app2')

@section('title', 'Tambah Unit')
@section('fitur', 'TAMBAH UNIT ')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form action="unit" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Unit</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="nama_unit"id="nama_unit" class="form-control"
                                                placeholder="Nama Unit">
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Telepon</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" name="telepon"id="telepon" class="form-control"
                                                placeholder="No Telepon">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"  name="email"id="email" class="form-control"
                                                placeholder="Email">
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















