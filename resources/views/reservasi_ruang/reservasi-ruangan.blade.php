@extends('layouts.app2')

@section('title', 'Reservasi Ruangan')
@section('fitur', 'RESERVASI RUANGAN')
@section('link', '/reservasi-ruangan')
@section('nama link', 'Reservasi Ruangan')


@section('content')

    <div class="container ">
        <div class="row">
            @foreach ($reservasi_ruang as $data)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" src="{{ $data->foto_ruang[0]->nama_foto }}" alt="Card image cap"   style="height: 12rem">

                            <div class="card-body">
                                <h4 class="card-title">{{ $data->nama_ruang }}</h4>
                                <table class="table table-borderless">
                                    <tbody>

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
                                        <tr>
                                            <th scope="row">Fasilitas</th>
                                            <td> : </td>
                                            <td> {{ $data->fasilitas}}</td>

                                    </tr>
                                    </tbody>
                                </table>
                                <div class=" d-flex justify-content-end">
                                    <a href="/reservasi-ruang-add/{{ $data->id }}"><button type="submit"class="btn btn-primary block">Reservasi</button></a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
