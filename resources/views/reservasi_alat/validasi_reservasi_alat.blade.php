@extends('layouts.app2')

@section('title', 'Validasi Reservasi Alat')
@section('fitur', 'VALIDASI RESERVASI ALAT')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/validasi-reservasi-alat/{{ $reservasi_alat->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nomor Reservasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <b><input type="text"name="no_reservasi"id="no_reservasi" class="form-control"
                                                value="{{ $reservasi_alat->no_reservasi }}" readonly></b>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <label>Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="nama_alat"id="nama_alat" class="form-control"
                                                value="{{ $reservasi_alat->alat->nama_alat }}" readonly>
                                            <input type="text"name="alat_id"id="alat_id" class="form-control"
                                                value="{{ $reservasi_alat->alat->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Inventaris</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="no_inventaris" id="no_inventaris"
                                                class="form-control" value="{{ $reservasi_alat->alat->no_inventaris }}"
                                                readonly>
                                            <input type="text"name="alat_id"id="alat_id" class="form-control"
                                                value="{{ $reservasi_alat->alat->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="gedung_id"id="gedung_id" class="form-control"
                                                value="{{ $reservasi_alat->alat->gedung->nama_gedung }} - {{ $reservasi_alat->alat->gedung->lokasi->nama_lokasi }}"
                                                readonly>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <label>Peminjam</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="user_id"id="user_id" class="form-control"
                                                value="{{ $reservasi_alat->user->nama }}"readonly>
                                            <input type="text"name="user_id"id="user_id" class="form-control"
                                                value="{{ $reservasi_alat->user->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="penanggung_jawab"id="penanggung_jawab"
                                                class="form-control"
                                                value="{{ $reservasi_alat->penanggung_jawab }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Telepon Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="no_telepon"id="no_telepon"
                                                class="form-control"
                                                value="{{ $reservasi_alat->no_telepon }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="unit_id"id="unit_id" class="form-control"
                                                value="{{ $reservasi_alat->unit->nama_unit }}" readonly>
                                            <input type="text"name="unit_id"id="unit_id" class="form-control"
                                                value="{{ $reservasi_alat->unit->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="kegiatan"id="kegiatan" class="form-control"
                                                value="{{ $reservasi_alat->kegiatan }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="date" name="tanggal_mulai"id="tanggal_mulai"
                                                class="form-control" value="{{ $reservasi_alat->tanggal_mulai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="date" name="tanggal_selesai"id="tanggal_selesai"
                                                class="form-control" value="{{ $reservasi_alat->tanggal_selesai }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="time" name="jam_mulai"id="jam_mulai" class="form-control"
                                                value="{{ $reservasi_alat->jam_mulai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="time" name="jam_selesai"id="jam_selesai"
                                                class="form-control" value="{{ $reservasi_alat->jam_selesai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <a href="{{ asset($reservasi_alat->surat) }}" target="_blank" class="btn icon icon-left btn-info"><i data-feather="file"></i> Lihat Surat</a>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">No Inventaris</th>
                                                    <th scope="col">Nama Alat</th>
                                                    <th scope="col">Lokasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>{{ $reservasi_alat->no_inventaris }}</td>
                                                    <td>{{ $reservasi_alat->nama_alat }}</td>
                                                    {{-- <td>{{ $reservasi_alat->gedung->nama_gedung }} - {{ $reservasi_alat->gedung->lokasi->nama_lokasi }}</td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="col-md-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <input type="radio" name="status" id="status-proses" value="Proses Validasi" <?php echo ($reservasi_alat->status === 'Proses Validasi') ? ' checked' : ''; ?>>
                                                <label for="status-proses">Proses Validasi</label><br>
                                                <input type="radio" name="status" id="status-disetujui" value="Disetujui" <?php echo ($reservasi_alat->status === 'Disetujui') ? ' checked' : ''; ?>>
                                                <label for="status-disetujui">Disetujui</label><br>
                                                <input type="radio" name="status" id="status-ditolak" value="Ditolak" <?php echo ($reservasi_alat->status === 'Ditolak') ? ' checked' : ''; ?>>
                                                <label for="status-ditolak">Ditolak</label><br>
                                                <input type="radio" name="status" id="status-dibatalkan" value="Dibatalkan" <?php echo ($reservasi_alat->status === 'Dibatalkan') ? ' checked' : ''; ?>>
                                                <label for="status-dibatalkan">Dibatalkan</label><br>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Alasan Penolakan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="alasan"id="alasan" class="form-control"></textarea>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Validasi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
