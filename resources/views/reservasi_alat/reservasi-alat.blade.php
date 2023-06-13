{{-- @extends('layouts.app2')

@section('title', 'Reservasi Alat')
@section('fitur', 'RESERVASI ALAT')
@section('link', '/reservasi-alat')
@section('nama link', 'Reservasi Alat')


@section('content')

    <div class="container ">
        <div class="row">
            @foreach ($reservasi_alat as $data)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" src="{{ $data->foto_alat[0]->nama_foto }}" alt="Card image cap"
                                style="height: 12rem">

                            <div class="card-body">
                                <h4 class="card-title">{{ $data->nama_alat }}</h4>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <h6>
                                                <th scope="row">No Inventaris</th>
                                                <td> : </td>
                                                <td> {{ $data->no_inventaris }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Lokasi</th>
                                            <td> : </td>
                                            <td colspan="2">
                                                {{ $data->gedung->nama_gedung }} - {{ $data->gedung->lokasi->nama_lokasi }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class=" d-flex justify-content-end">

                                    <a href="/reservasi-alat-add/{{ $data->id }}">
                                        <button type="submit"class="btn btn-primary block">Reservasi</button>

                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection --}}






@extends('layouts.app2')

@section('title', 'Reservasi Alat')
@section('fitur', 'RESERVASI ALAT')
@section('link', '/reservasi-alat')
@section('nama link', 'Reservasi Alat')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Cek Ketersediaan Alat</h4>
                        <form id="cekKetersediaanForm" action="{{ route('prosesCekKetersediaanAlat') }}" method="GET"
                            class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="tanggal_mulai" class="mr-2">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="cek_tanggal_mulai" name="cek_tanggal_mulai"
                                    required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="tanggal_selesai" class="mr-2">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="cek_tanggal_selesai"
                                    name="cek_tanggal_selesai" required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="jam_mulai" class="mr-2">Jam Mulai</label>
                                <input type="time" class="form-control" id="cek_jam_mulai" name="cek_jam_mulai" required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="jam_selesai" class="mr-2">Jam Selesai</label>
                                <input type="time" class="form-control" id="cek_jam_selesai" name="cek_jam_selesai"
                                    required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <button id="cekKetersediaanButton" type="submit" class="btn btn-primary">Cek
                                    Ketersediaan</button>
                            </div>
                        </form>
                        <script>
                            $(document).ready(function() {
                                $('#cekKetersediaanForm').submit(function(event) {
                                    event.preventDefault(); // Prevent form submission

                                    // Perform AJAX request
                                    $.ajax({
                                        url: $(this).attr('action'),
                                        method: 'GET',
                                        data: $(this).serialize(),
                                        success: function(response) {
                                            // Clear previous cards
                                            $('#cardContainer').empty();

                                            // Iterate over the response data and create card components
                                            $.each(response, function(index, data) {

                                                var card = `
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src=${data.foto_alat[0].nama_foto} alt="Card image cap" style="height: 12rem" />

                                    <div class="card-body">
                                        <h4 class="card-title">${data.no_inventaris}</h4>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Nama Alat</th>
                                                    <td>:</td>
                                                    <td>${data.nama_alat}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Lokasi</th>
                                                    <td>:</td>
                                                    <td colspan="2">${data.gedung.nama_gedung} ${data.gedung.lokasi.nama_lokasi}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-end">
                                            <a href="/reservasi-alat-add/${data.id}">
                                                <button type="submit" class="btn btn-primary block">Reservasi</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                                                $('#cardContainer').append(card);
                                            });

                                            // Show the card section
                                            $('#cardContentSection').show();
                                        },
                                        error: function(error) {
                                            console.log(error);
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div id="cardContentSection" style="display: none;">
            <div class="row" id="cardContainer">

            </div>
        </div>
    @endsection
