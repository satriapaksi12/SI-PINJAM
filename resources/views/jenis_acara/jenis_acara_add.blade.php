@extends('layouts.app')

@section('title', 'Tambah Jenis Acara')

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
                        <h3 class="card-title">TAMBAH JENIS ACARA</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="jenis_acara" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_unit">Nama Jenis Acara</label>
                                <input type="text" class="form-control"  name="nama_jenis_acara"id="nama_jenis_acara"
                                    placeholder="">
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