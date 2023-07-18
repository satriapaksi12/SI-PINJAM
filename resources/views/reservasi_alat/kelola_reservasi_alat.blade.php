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
            <div class="separator"></div>
            <center><p>EXPORT DATA TO EXCEL BY MONTH AND YEAR</p></center>
            <div class="card-header flex-container">
                <form action="{{ route('export.reservasi.alat') }}" method="get">
                    <label for="bulan">Bulan</label>
                    <select class="form-select" name="bulan" id="bulan">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                        @endfor
                    </select>

                    <label for="tahun">Tahun</label>
                    <select class="form-select" name="tahun" id="tahun">
                        @for ($year = date('Y'); $year >= 2020; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-outline-primary">Export to Excel</button>
                    </div>
                </form>
            </div>
            <div class="separator"></div>
            <style>
                .separator {
                    width: 100%;
                    height: 1px;
                    background-color: #ddd;
                    /* Ganti dengan warna garis yang sesuai */
                    margin: 15px 0;
                    /* Sesuaikan margin atas dan bawah sesuai preferensi Anda */
                }
            </style>
            <div class="card-header flex-container">
                <a href="/reservasi-alat" class="btn btn-primary">Add Data</a>
                <a href="/export-reservasi_alat" class="btn btn-success">Export Excel</a>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#inlineForm">
                    Import Excel
                </button>
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
                                    @if ($data->status == 'Proses Validasi')
                                        <a href="validasi-reservasi-alat/{{ $data->id }}"
                                            class="btn icon btn-warning" title="Validasi"><i class="bi bi-check2-circle"></i></a>
                                    @else
                                        <a href="/detail-reservasi-alat/{{ $data->id }}"
                                            class="btn icon btn-primary" title="Detail"><i class="bi bi-eye"></i></a>
                                        <a href="validasi-reservasi-alat/{{ $data->id }}"
                                            class="btn icon btn-warning" title="Validasi"><i class="bi bi-check2-circle"></i></a>
                                    @endif


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

                                            <form id="import-form" action="/import-reservasi_alat" method="POST"
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
@endsection
