@extends('layouts.app2')

@section('title', 'Jenis Acara')
@section('fitur', 'DAFTAR JENIS ACARA')
@section('link', '/jenis_acara')
@section('nama link', 'Jenis Acara')

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


    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="/jenis_acara-add" class="btn btn-primary">Add Data</a>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                                <th>Jenis Acara</th>
                                <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenisacaraList as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_jenis_acara }}</td>
                                <td>

                                    <a href="jenis_acara-edit/{{ $data->id }}" class="btn icon btn-warning"><i
                                            class="bi bi-pencil"></i></a>
                                    <form action="/jenis_acara-destroy/{{ $data->id }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="return confirm('Apakah anda ingin menghapus data jenis acara  {{ $data->nama_jenis_acara }} ')"
                                            class="btn icon btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
@endsection
