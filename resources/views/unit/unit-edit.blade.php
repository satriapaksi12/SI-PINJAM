@extends('layouts.app')

@section('title', 'Superadmin|Edit Unit')

@include('component.navbar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('component.sidebar')
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
    </div>
@endsection
