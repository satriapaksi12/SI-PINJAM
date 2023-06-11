@extends('layouts.app2')

@section('title', 'Gedung')
@section('fitur', 'DAFTAR GEDUNG')
@section('link', '/gedung')
@section('nama link', 'Gedung')


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
            <div class="card-header d-flex">
                <a href="/gedung-add" class="btn btn-primary">Add Data</a>
                <a href="/export-gedungs" class="btn btn-success">Export Excel</a>

                <form id="import-form" action="/import-gedungs" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="file" accept=".xlsx, .xls, .csv" style="display: none;">
                    <button type="button" class="btn btn-warning" id="import-btn">Import Excel</button>
                </form>

                <script>
                    document.getElementById('import-btn').addEventListener('click', function() {
                        document.getElementById('file').click();
                    });
                </script>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Gedung</th>
                            <th>Lokasi Kampus</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gedungList as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_gedung }}</td>
                                <td>{{ $data->lokasi->nama_lokasi }}</td>
                                <td>

                                    <a href="gedung-edit/{{ $data->id }}" class="btn icon btn-warning"><i
                                            class="bi bi-pencil"></i></a>
                                    <form action="/gedung-destroy/{{ $data->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="return confirm('Apakah anda ingin menghapus data gedung {{ $data->nama_gedung }} di {{ $data->lokasi->nama_lokasi }} ')"
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
@endsection
