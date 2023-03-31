@extends('layouts.app2')

@section('title', 'Reservasi Kendaraan')
@section('fitur', 'RESERVASI KENDARAAN')
@section('link', '/reservasi-kendaraan')
@section('nama link', 'Reservasi Kendaraan')


@section('content')

    <div class="container ">
        <div class="row">
            @foreach ($reservasi_kendaraan as $data)
                <div class="col-lg-3 col-md-4 col-sm-6">


                    <div class="card">
                        <div class="card-content">
                            @if ($data->jenis_kendaraan->nama_jenis_kendaraan == 'mobil')
                            <img class="card-img-top img-fluid" src="img/mobil.png" alt="Card image cap"
                            style="height: 12rem" />
                            @endif
                            @if ($data->jenis_kendaraan->nama_jenis_kendaraan == 'motor')
                            <img class="card-img-top img-fluid" src="img/motor.png" alt="Card image cap"
                            style="height: 12rem" />
                            @endif
                            @if ($data->jenis_kendaraan->nama_jenis_kendaraan == 'ambulance')
                            <img class="card-img-top img-fluid" src="img/ambulance.png" alt="Card image cap"
                            style="height: 12rem" />
                            @endif
                            @if ($data->jenis_kendaraan->nama_jenis_kendaraan == 'truck')
                            <img class="card-img-top img-fluid" src="img/truck.png" alt="Card image cap"
                            style="height: 12rem" />
                            @endif
                            @if ($data->jenis_kendaraan->nama_jenis_kendaraan == 'bus')
                            <img class="card-img-top img-fluid" src="img/bus.png" alt="Card image cap"
                            style="height: 12rem" />
                            @endif

                            <div class="card-body">

                                <h4 class="card-title">{{ $data->no_polisi }}</h4>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <h6>
                                                <th scope="row">Jenis Kendaraan</th>
                                                <td> : </td>
                                                <td> {{ $data->jenis_kendaraan->nama_jenis_kendaraan }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Kapasitas</th>
                                            <td> : </td>
                                            <td>{{ $data->kapasitas }}</td>

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
                                    <button type="submit"class="btn btn-primary block">Reservasi</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
