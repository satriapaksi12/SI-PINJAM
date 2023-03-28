@extends('layouts.app2')

@section('title', 'Edit Unit')
@section('fitur', 'EDIT UNIT')


@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">
                            <form action="/unit/{{ $unit->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Unit</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="nama_unit"id="nama_unit" class="form-control"
                                            value="{{ $unit->nama_unit }}"  placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Telepon</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" name="telepon"id="telepon" class="form-control"
                                            value="{{ $unit->telepon }}" placeholder="">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="email"id="email" class="form-control"
                                            value="{{ $unit->email }}"  placeholder="">
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


{{-- <div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">EDIT UNIT</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/unit/{{ $unit->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_unit">Nama Unit</label>
                            <input type="text" class="form-control" name="nama_unit"id="nama_unit"
                                value="{{ $unit->nama_unit }}" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama_unit">No Telepon</label>
                            <input type="text" class="form-control" name="telepon"id="telepon"
                                value="{{ $unit->telepon }}" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="nama_unit">Email</label>
                            <input type="text" class="form-control" name="email"id="email"
                                value="{{ $unit->email }}" placeholder="">
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
</div> --}}
