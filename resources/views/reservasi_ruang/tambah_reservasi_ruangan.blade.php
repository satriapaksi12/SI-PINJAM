@extends('layouts.app2')

@section('title', 'Tambah Reservasi Ruangan')
@section('fitur', 'TAMBAH RESERVASI RUANGAN')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/reservasi-ruang" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Ruang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="nama_ruang"id="nama_ruang" class="form-control"
                                                value="{{ $ruang->nama_ruang }}" readonly>
                                            <input type="text"name="ruang_id"id="ruang_id" class="form-control"
                                                value="{{ $ruang->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kapasitas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="kapasitas"id="kapasitas" class="form-control"
                                                value="{{ $ruang->kapasitas }}" readonly>
                                            <input type="text"name="ruang_id"id="ruang_id" class="form-control"
                                                value="{{ $ruang->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Fasilitas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="fasilitas"id="fasilitas" class="form-control"
                                                value="{{ $ruang->fasilitas }}" readonly>
                                            <input type="text"name="ruang_id"id="ruang_id" class="form-control"
                                                value="{{ $ruang->id }}" hidden>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"name="gedung_id"id="gedung_id" class="form-control"
                                                value="{{ $ruang->gedung->nama_gedung }} - {{ $ruang->gedung->lokasi->nama_lokasi }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Periode</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="periode_id" id="periode_id">
                                                    @foreach ($periode as $item)
                                                        <option value="{{ $item->id }}">{{ $item->tahun_periode }} -
                                                            {{ $item->semester }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jenis Acara</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <script>
                                                function toggleFormInput() {
                                                    var dropdown = document.getElementById("dropdown");
                                                    var formInputs = document.getElementsByClassName("formInput");
                                                    for (var i = 0; i < formInputs.length; i++) {
                                                        var formInput = formInputs[i];

                                                        if (dropdown.value === "1") {
                                                            formInput.style.display = "block"; // Show form input
                                                        } else {
                                                            formInput.style.display = "none"; // Hide form input
                                                        }
                                                    }
                                                }
                                            </script>
                                            <fieldset class="form-group">
                                                <select class="form-select" name="jenis_acara_id" id="dropdown"
                                                    onchange="toggleFormInput()">
                                                    @foreach ($jenis_acara as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_jenis_acara }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4 formInput">
                                            <label>Surat Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group formInput">
                                            <input class="form-control" type="file" name="surat" id="surat">
                                        </div>
                                        <div class="col-md-4 formInput">
                                            <label>Kelas</label>
                                        </div>
                                        <div class="col-md-8 form-group formInput">
                                            <input type="text" name="kelas"id="kelas" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Peminjam</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="user_id"id="user_id" class="form-control"
                                                value="{{ Auth::user()->nama }}"readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="penanggung_jawab"id="penanggung_jawab"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>No Telepon Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="no_telepon"id="no_telepon" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit Penanggungjawab</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="unit_id" id="unit_id">
                                                    @foreach ($unit as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_unit }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" name="kegiatan"id="kegiatan" class="form-control">
                                        </div>
                                        <script>
                                            function checkTanggalMulai() {
                                                moment.locale('id');
                                                var tanggalMulaiInput = document.getElementById('tanggal_mulai');
                                                var tanggalSelesaiInput = document.getElementById('tanggal_selesai');

                                                var tanggalMulai = moment(tanggalMulaiInput.value);
                                                var tanggalSelesai = moment(tanggalSelesaiInput.value);

                                                var namaHariMulai = tanggalMulai.format('dddd');
                                                var namaHariSelesai = tanggalSelesai.format('dddd');

                                                var currentDay = moment(tanggalMulai);
                                                var dayRange = [];

                                                while (currentDay.isSameOrBefore(tanggalSelesai)) {
                                                    dayRange.push(currentDay.format('dddd'));
                                                    currentDay.add(1, 'day');
                                                }

                                                console.log(dayRange);

                                                var sesiHariLabels = document.querySelectorAll('.sesiHariLabel');

                                                sesiHariLabels.forEach(function(sesiHariLabel) {
                                                    var sesiHariText = sesiHariLabel.textContent;
                                                    var sesiHariLabelDay = sesiHariText.match(/Hari ([\w]+)/)[1];

                                                    if (dayRange.includes(sesiHariLabelDay)) {
                                                        sesiHariLabel.style.display = 'block';
                                                    } else {
                                                        sesiHariLabel.style.display = 'none';
                                                    }
                                                });
                                            }
                                        </script>
                                        <div class="col-md-4">
                                            <label>Tanggal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" onchange="checkTanggalMulai()"
                                                name="tanggal_selesai"id="tanggal_selesai" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Sesi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            {{-- <div class="form-check">
                                                @foreach ($sesi as $item)
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $item->id }}" name="sesi_id" id="sesi_id">
                                                    <label id="sesiHari" class="form-check-label" for="flexCheckDefault">
                                                        Sesi {{ $item->sesi }} Hari {{ $item->hari }}
                                                        {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
                                                    </label>
                                                @endforeach
                                            </div> --}}
                                            <div class="form-check sesiHari">
                                                @foreach ($sesi as $item)
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $item->id }}" name="sesi_id" id="sesi_id">
                                                    <label class="form-check-label sesiHariLabel" for="flexCheckDefault">
                                                        Sesi {{ $item->sesi }} Hari {{ $item->hari }}
                                                        {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div cass="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
