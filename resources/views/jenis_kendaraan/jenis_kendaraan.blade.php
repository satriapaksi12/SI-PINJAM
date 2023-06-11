@extends('layouts.app2')

@section('title', 'Jenis Kendaraan')
@section('fitur', 'DAFTAR JENIS KENDARAAN')
@section('link', '/jenis_kendaraan')
@section('nama link', 'Jenis Kendaraan')
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
                <a href="/jenis_kendaraan-add" class="btn btn-primary">Add Data</a>
                <a href="/export-jenis_kendaraan" class="btn btn-success">Export Excel</a>

                <form id="import-form" action="/import-jenis_kendaraan" method="POST" enctype="multipart/form-data">
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
                            <th>Jenis Kendaraan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jeniskendaraanList as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_jenis_kendaraan }}</td>
                                <td>

                                    <a href="jenis_kendaraan-edit/{{ $data->id }}" class="btn icon btn-warning"><i
                                            class="bi bi-pencil"></i></a>
                                    <form action="/jenis_kendaraan-destroy/{{ $data->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="return confirm('Apakah anda ingin menghapus data jenis kendaraan  {{ $data->nama_jenis_kendaraan }} ')"
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
