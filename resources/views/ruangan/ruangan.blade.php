@extends('layouts.app2')

@section('title', 'Ruangan')
@section('fitur', 'DAFTAR RUANGAN')
@section('link', '/ruangan')
@section('nama link', 'Ruangan')

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
        <a href="/ruang-add" class="btn btn-primary">Add Data</a>
        <a href="/export-ruang" class="btn btn-success">Export Excel</a>

        <form id="import-form" action="/import-ruang" method="POST" enctype="multipart/form-data">
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
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Lokasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ruang as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_ruang }}</td>
                        <td>{{ $data->kapasitas }}</td>
                        <td>{{ $data->gedung->nama_gedung }} - {{ $data->gedung->lokasi->nama_lokasi}}</td>
                        <td>
                            <a href="ruang/{{ $data->id }}" class="btn icon btn-info"><i
                                class="bi bi-eye"></i></a>
                            <a href="ruang-edit/{{ $data->id }}" class="btn icon btn-warning"><i
                                    class="bi bi-pencil"></i></a>
                            <form action="/ruang-destroy/{{ $data->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button
                                    onclick="return confirm('Apakah anda ingin menghapus data ruangan {{ $data->nama_ruang }}  ')"
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









