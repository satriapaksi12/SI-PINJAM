@extends('layouts.app2')

@section('title', 'User Aktif')
@section('fitur', 'USER AKTIF')
@section('link', '/user')
@section('nama link', 'User')


@section('content')



    @if (Session::has('status'))
        <div class="alert alert-success"><i class="bi bi-check-circle"></i> {{ Session::get('message') }}</div>
    @endif

    @if (Session::has('status-edit'))
        <div class="alert alert-warning"><i class="bi bi-check-circle"></i> {{ Session::get('message-edit') }}</div>
    @endif
    @if (Session::has('status-delete'))
        <div class="alert alert-danger"><i class="bi bi-check-circle"></i> {{ Session::get('message-delete') }}</div>
    @endif

    @if (Session::has('status-restore'))
        <div class="alert alert-info"><i class="bi bi-check-circle"></i> {{ Session::get('message-restore') }}</div>
    @endif



    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header flex-container">
                <a href="/user-add" class="btn btn-primary">Add Data</a>
                <a href="/export-users" class="btn btn-success">Export Excel</a>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#inlineForm">
                    Import Excel
                </button>
            </div>

            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk</th>
                            <th>Nama</th>
                            <th>Unit</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userList as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nomor_induk }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->unit->nama_unit }}</td>
                                <td>{{ $data->role->nama_role }}</td>
                                <td>

                                    <a href="user/{{ $data->id }}" class="btn icon btn-info"><i
                                            class="bi bi-eye"></i></a>
                                    <a href="user-edit/{{ $data->id }}" class="btn icon btn-warning"><i
                                            class="bi bi-pencil"></i></a>
                                    <form action="/user-destroy/{{ $data->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="return confirm('Apakah anda ingin menonaktifkan data user {{ $data->nama }} dengan nomor induk {{ $data->nomor_induk }} ')"
                                            class="btn icon btn-danger"><i class="bi bi-person-x-fill"></i></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">
                                                    Import Excel
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>

                                            <form id="import-form" action="/import-users" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <input class="form-control" type="file" name="file"
                                                            id="file" accept=".xlsx, .xls, .csv">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ms-1"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Import</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->

@endsection
