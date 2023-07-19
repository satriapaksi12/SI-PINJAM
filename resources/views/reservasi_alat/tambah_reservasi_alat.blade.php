@extends('layouts.app2')

@section('title', 'Tambah Reservasi Alat')
@section('fitur', 'TAMBAH RESERVASI ALAT')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/reservasi-alat" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        {{-- <div class="col-md-4">
                                            <label>Nama Alat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="nama_alat"id="nama_alat" class="form-control"
                                                value="{{ $alat->nama_alat }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nomor Inventaris</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text" name="no_inventaris" id="no_inventaris"
                                                class="form-control" value="{{ $alat->no_inventaris }}" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
                                            <input type="text"name="gedung_id"id="gedung_id" class="form-control"
                                                value="{{ $alat->gedung->nama_gedung }} - {{ $alat->gedung->lokasi->nama_lokasi }}"
                                                readonly>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <label>Peminjam</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <fieldset disabled>
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
                                                        <option value="{{ $item->id }}">{{ $item->nama_unit }} </option>
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
                                        <div class="col-md-4">
                                            <label>Tanggal Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_mulai"id="tanggal_mulai"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Tanggal Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_selesai"id="tanggal_selesai"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Mulai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="time" name="jam_mulai"id="jam_mulai" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jam Selesai</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="time" name="jam_selesai"id="jam_selesai" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Surat Kegiatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input class="form-control" type="file" name="surat" id="surat">
                                        </div>
                                        {{-- untuk menyimpan data ke database --}}
                                        <input type="hidden" name="alat_id" value="{{ $alat->id }}">
                                        <div class="col-md-4">
                                            <label>Daftar ALat </label>
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
                                            <tbody id="selectedAlatTableBody">
                                                @foreach ($selectedAlats as $selectedAlat)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $selectedAlat['no_inventaris'] }}</td>
                                                        <td>{{ $selectedAlat['nama_alat'] }}</td>
                                                        <td>{{ $selectedAlat['gedung']['lokasi']['nama_lokasi'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
    <script>
        // Ambil parameter ID alat dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const selectedAlatIDs = urlParams.get('id');

        // Set nilai input tersembunyi dengan ID alat yang sudah dipilih
        $('#selectedAlatIDs').val(selectedAlatIDs);


        $(document).ready(function() {
            // Mengambil nilai ID alat yang dipilih dari input tersembunyi
            var selectedAlatIDs = $('#selectedAlatIDs').val().split(',');

            // Mendapatkan data alat berdasarkan ID yang dipilih
            var selectedAlats = [];

            $.ajax({
                url: 'http://127.0.0.1:8000/get-reservasi-alat-api', // Ganti URL dengan endpoint API yang sesuai
                method: 'GET',
                success: function(response) {
                    // Iterate over the response data and filter the selected alats
                    $.each(response, function(index, data) {
                        if (selectedAlatIDs.includes(data.id.toString())) {
                            selectedAlats.push(data);
                        }
                    });

                    // Generate the HTML content for selected alats
                    var tableContent = '';
                    $.each(selectedAlats, function(index, alat) {
                        tableContent += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${alat.no_inventaris}</td>
                        <td>${alat.nama_alat}</td>
                        <td>${alat.nama_lokasi}</td>
                    </tr>
                `;
                    });

                    // Update the table body with the selected alats
                    $('#selectedAlatTableBody').html(tableContent);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>


@endsection
