@extends('layouts.app2')

@section('title', 'DAFTAR RESERVASI RUANGAN')
@section('fitur', 'DAFTAR RESERVASI RUANGAN')
@section('link', '/daftar reservasi ruang')
@section('nama link', 'Daftar Reservasi Ruangan')

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
                <a href="/reservasi-ruang" class="btn btn-primary">Add Data</a>
            </div>
            <div class="card-body">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                setlocale(LC_TIME, 'id_ID.utf8');
                $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                ?>
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Reservasi</th>
                            <th>Periode</th>
                            <th>No Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th>Tanggal Reservasi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasi_ruang as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->no_reservasi }}</td>
                                <td>{{ $data->periode->tahun_periode }} - {{ $data->periode->semester }}</td>
                                <td>{{ $data->ruang->no_ruang}}</td>
                                <td>{{ $data->ruang->nama_ruang}}</td>
                                <td>{{ strftime('%d', strtotime($data->tanggal_mulai)) }}
                                    {{ $bulanIndonesia[intval(strftime('%m', strtotime($data->tanggal_mulai))) - 1] }}
                                    {{ strftime('%Y', strtotime($data->tanggal_mulai)) }}
                                    -
                                    {{ strftime('%d', strtotime($data->tanggal_selesai)) }}
                                    {{ $bulanIndonesia[intval(strftime('%m', strtotime($data->tanggal_selesai))) - 1] }}
                                    {{ strftime('%Y', strtotime($data->tanggal_selesai)) }}
                                </td>
                                <td>
                                    @if ($data->status == 'Proses Validasi')
                                    <span class="badge bg-warning">Proses Validasi</span>
                                    @endif
                                    @if ($data->status == 'Disetujui')
                                    <spbooan class="badge bg-success">Disetujui</spbooan>
                                    @endif
                                    @if ($data->status == 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                    @if ($data->status == 'Dibatalkan')
                                    <span class="badge bg-secondary ">Dibatalkan</span>
                                @endif
                                </td>
                                <td>
                                    <a href="/detail-reservasi-ruang/{{ $data->id }}" class="btn icon btn-primary" title="Detail"><i
                                            class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
