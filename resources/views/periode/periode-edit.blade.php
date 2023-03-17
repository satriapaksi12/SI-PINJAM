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
                        <h3 class="card-title">EDIT PERIODE</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/periode/{{ $periode->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">Tahun Periode</label>
                                <input type="text" class="form-control" name="tahun_periode"id="tahun_periode" value="{{ $periode->tahun_periode }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                <label for="gender" class="form-label">Semester</label>
                                <select class="form-control" name="semester" id="semester">
                                    <option value="{{ $periode->semester }}">{{ $periode->semester }}</option>
                                    @if ($periode->semester == 'Ganjil')
                                        <option value="Genap">Genap</option>
                                    @else
                                        <option value="Ganjil">Ganjil</option>
                                    @endif
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
