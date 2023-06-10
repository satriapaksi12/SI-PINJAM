@extends('layouts.app2')

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
                                    {{-- <script>
                                        function cekStatusItem() {
                                            // Mengambil status item dari database
                                            var statusItem = getStatusItemFromDatabase();

                                            // Memeriksa status item dan menonaktifkan tombol jika diperlukan
                                            if (statusItem === "disetujui") {
                                                document.getElementById("reservasiButton").disabled = true;
                                            }
                                        }
                                    </script> --}}
                                    <a href="/reservasi-alat-add/{{ $data->id }}">
                                        <button type="submit"class="btn btn-primary block">Reservasi</button>
                                        {{-- <button id="reservasiButton" type="button" <?php echo $disabled; ?>
                                            onclick="reservasiAlat()">Reservasi</button> --}}
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
