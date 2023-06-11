@extends('layouts.app2')

@section('title', 'KELOLA RESERVASI Alat')
@section('fitur', 'KELOLA RESERVASI ALAT')
@section('link', '/kelola reservasi alat')
@section('nama link', 'KElola Reservasi Alat')

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
                <a href="/reservasi-alat" class="btn btn-primary">Add Data</a>
                <a href="/export-reservasi_alat" class="btn btn-success">Export Excel</a>

                <form id="import-form" action="/import-reservasi_alat" method="POST" enctype="multipart/form-data">
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
                            <th>No Reservasi</th>
                            <th>No Inventaris</th>
                            <th>Nama Alat</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasi_alat as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->no_reservasi }}</td>
                                <td>{{ $data->alat->no_inventaris }}</td>
                                <td>{{ $data->alat->nama_alat }}</td>
                                <td>{{ $data->tanggal_mulai }}</td>
                                <td>{{ $data->tanggal_selesai }}</td>
                                <td>{{ $data->jam_mulai }}</td>
                                <td>{{ $data->jam_selesai }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    @if ($data->status == 'Proses Validasi')
                                        <a href="validasi-reservasi-alat/{{ $data->id }}"
                                            class="btn icon btn-warning"><i class="bi bi-check2-circle"></i></a>
                                    @else
                                        <a href="/detail-reservasi-alat/{{ $data->id }}"
                                            class="btn icon btn-primary"><i class="bi bi-eye"></i></a>
                                        <a href="validasi-reservasi-alat/{{ $data->id }}"
                                            class="btn icon btn-warning"><i class="bi bi-check2-circle"></i></a>
                                    @endif


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
