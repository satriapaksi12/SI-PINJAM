@extends('layouts.app2')

@section('title', 'Validasi Reservasi Ruangan')
@section('fitur', 'VALIDASI RESERVASI RUANGAN')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/validasi-reservasi-ruang/{{ $reservasi_ruang->id }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nomor Reservasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <b><input type="text"name="no_reservasi"id="no_reservasi" class="form-control"
                                                value="{{ $reservasi_ruang->no_reservasi }}" readonly></b>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Ruang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="nama_ruang"id="nama_ruang" class="form-control"
                                                value="{{ $reservasi_ruang->ruang->nama_ruang }}" readonly>
                                            <input type="text"name="ruang_id"id="ruang_id" class="form-control"
                                                value="{{ $reservasi_ruang->ruang->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kapasitas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="kapasitas"id="kapasitas" class="form-control"
                                                value="{{ $reservasi_ruang->ruang->kapasitas }}" readonly>
                                            <input type="text"name="ruang_id"id="ruang_id" class="form-control"
                                                value="{{$reservasi_ruang->ruang->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Fasilitas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="fasilitas"id="fasilitas" class="form-control"
                                                value="{{ $reservasi_ruang->ruang->fasilitas }}" readonly>
                                            <input type="text"name="ruang_id"id="ruang_id" class="form-control"
                                                value="{{$reservasi_ruang->ruang->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="gedung_id"id="gedung_id" class="form-control"
                                                value="{{ $reservasi_ruang->ruang->gedung->nama_gedung }} - {{$reservasi_ruang->ruang->gedung->lokasi->nama_lokasi }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Periode</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="gedung_id"id="gedung_id" class="form-control"
                                                value="{{ $reservasi_ruang->periode->tahun_periode }} - {{ $reservasi_ruang->periode->semester }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jenis Acara</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="gedung_id"id="gedung_id" class="form-control"
                                                value="{{$reservasi_ruang->jenis_acara->nama_jenis_acara }} "
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kelas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            @if ($reservasi_ruang->kelas == null)
                                                <input type="text" name="kelas"id="kelas" class="form-control"
                                                    value="Tidak Ada Kelas Yang Dipilih"readonly>
                                                <input type="text"name="kelas"id="kelas" class="form-control"
                                                    value="Tidak Ada Kelas Yang Dipilih" hidden>
                                            @endif
                                            @if ($reservasi_ruang->kelas != null)
                                                <input type="text" name="kelas"id="kelas" class="form-control"
                                                    value="{{ $reservasi_ruang->kelas }}"readonly>
                                                <input type="text"name="kelas"id="kelas" class="form-control"
                                                    value="{{ $reservasi_ruang->kelas }}" hidden>
                                            @endif

                                        </div>
                                        <div class="col-md-4">
                                            <label>Peminjam</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="user_id"id="user_id" class="form-control"
                                                value="{{ $reservasi_ruang->user->nama }}"readonly>
                                            <input type="text"name="user_id"id="user_id" class="form-control"
                                                value="{{$reservasi_ruang->user->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="penanggung_jawab"id="penanggung_jawab"
                                                class="form-control"
                                                value="{{ $reservasi_ruang->penanggung_jawab }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Telepon Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="no_telepon"id="no_telepon"
                                                class="form-control"
                                                value="{{ $reservasi_ruang->no_telepon }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="unit_id"id="unit_id" class="form-control"
                                                value="{{ $reservasi_ruang->unit->nama_unit }}" readonly>
                                            <input type="text"name="unit_id"id="unit_id" class="form-control"
                                                value="{{ $reservasi_ruang->unit->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="kegiatan"id="kegiatan" class="form-control"
                                                value="{{ $reservasi_ruang->kegiatan }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_mulai"id="tanggal_mulai"
                                                class="form-control" value="{{ $reservasi_ruang->tanggal_mulai }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_selesai"id="tanggal_selesai"
                                                class="form-control" value="{{ $reservasi_ruang->tanggal_selesai }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Sesi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <ul>
                                                @foreach ($reservasi_ruang->sesi as $item)
                                                    <li>{{ $item->sesi }} - Hari {{ $item->hari }} ({{ $item->jam_mulai }} - {{ $item->jam_selesai }})</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <label>Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <a href="{{ $reservasi_alat->surat }}">Link Surat</a>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="status" id="status">
                                                    <option value="">Pilih salah satu</option>
                                                    <option value="Proses Validasi ">Proses Validasi</option>
                                                    <option value="Disetujui">Disetujui</option>
                                                    <option value="Ditolak">Ditolak</option>
                                                </select>
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
