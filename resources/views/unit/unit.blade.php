@extends('layouts.app')

@section('title', 'Unit')

@include('component.navbar')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('component.sidebar')
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/unit-add" class="btn btn-primary">Add Data</a>
                    </div>
                    @if (Session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    @if (Session::has('status-edit'))
                        <div class="alert alert-warning" role="alert">
                            {{ Session::get('message-edit') }}
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Unit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unitList as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_unit }}</td>
                                        <td>
                                            <a href="unit-edit/{{ $data->id }}" class="btn btn-warning">Edit</a>
                                            <form action="/unit-destroy/{{ $data->id }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    onclick="return confirm('Apakah anda ingin menghapus data unit yaitu {{ $data->nama_unit }} ')"
                                                    class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Unit</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
