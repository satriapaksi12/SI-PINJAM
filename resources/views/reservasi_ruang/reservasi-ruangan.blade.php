@extends('layouts.app2')

@section('title', 'Reservasi Ruangan')
@section('fitur', 'RESERVASI RUANGAN')
@section('link', '/reservasi-ruangan')
@section('nama link', 'Reservasi Ruangan')



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Cek Ketersediaan Ruangan</h4>
                        <form id="cekKetersediaanForm" action="{{ route('prosesCekKetersediaanRuang') }}" method="GET"
                            class="form-inline">
                            @csrf
                            <script>
                                function checkTanggalMulai() {
                                    moment.locale('id');
                                    var tanggalMulaiInput = document.getElementById('cek_tanggal_mulai');
                                    var tanggalSelesaiInput = document.getElementById('cek_tanggal_selesai');

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
                                <input type="date" name="cek_tanggal_mulai" id="cek_tanggal_mulai" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Tanggal Selesai</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" onchange="checkTanggalMulai()" name="cek_tanggal_selesai"
                                    id="cek_tanggal_selesai" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Sesi</label>
                            </div>
                            <div class="col-md-8 form-group">

                                <div class="form-check sesiHari">
                                    @foreach ($sesi as $item)
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                            name="sesi_id[]" id="sesi_id[]">
                                        <label class="form-check-label sesiHariLabel" for="flexCheckDefault">
                                            Sesi {{ $item->sesi }} Hari {{ $item->hari }}
                                            {{ $item->jam_mulai }} - {{ $item->jam_selesai }}
                                        </label>
                                    @endforeach
                                </div>
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
                                                console.log(data)
                                                var card = `
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src=${data.foto_ruang[0].nama_foto}
                                        alt="Card image cap" style="height: 12rem" />

                                    <div class="card-body">
                                        <h4 class="card-title">${data.nama_ruang}</h4>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Kapasitas</th>
                                                    <td>:</td>
                                                    <td>${data.kapasitas}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Fasilitas</th>
                                                    <td>:</td>
                                                    <td>${data.fasilitas}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Lokasi</th>
                                                    <td>:</td>
                                                    <td colspan="2">${data.gedung.nama_gedung}
                                                        ${data.gedung.lokasi.nama_lokasi}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-end">
                                            <a href="/reservasi-ruang-add/${data.id}">
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
