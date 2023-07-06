@extends('layouts.app2')

@section('title', 'Dashboard')

@section('content')
    {{-- <center>
    <h1>Welcome </h1>
    <p>This is the dashboard page.</p>
    <img src="img/welcome.png" width="300px" alt="" srcset="">
</center> --}}

    <div class="page-heading">
        <h3>Selamat datang {{ Auth::user()->nama }} </h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">

            </div>

            <style>
                .reservasi-card.ruangan {
                    background-color: #8c7bd8;
                    /* Warna latar belakang ruangan */
                }

                .reservasi-card.alat {
                    background-color: #52a1e2;
                    /* Warna latar belakang alat */
                }

                .reservasi-card.kendaraan {
                    background-color: #48df98;
                    /* Warna latar belakang kendaraan */
                }

                .reservasi-card h5,
                .reservasi-card p {
                    color: #ffffff;
                    /* Warna teks */
                }
            </style>

            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="card-header">
                                <h4>Jumlah Aset</h4>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card">
                                    <div class="card-body px-4 py-4">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="fas fa-door-open"></i>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <h6 class="text-muted font-semibold">Ruangan</h6>
                                                <h6 class="font-extrabold mb-0">{{ $jumlahRuangan }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card">
                                    <div class="card-body px-4 py-4">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="fas fa-tools"></i>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <h6 class="text-muted font-semibold">Alat</h6>
                                                <h6 class="font-extrabold mb-0">{{ $jumlahAlat }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card">
                                    <div class="card-body px-4 py-4">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <div class="stats-icon green mb-2">
                                                    <i class="fa fa-car"></i>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <h6 class="text-muted font-semibold">Kendaraan</h6>
                                                <h6 class="font-extrabold mb-0">{{ $jumlahKendaraan }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="card-header">
                                    <h4>Reservasi Anda</h4>
                                </div>
                                <div class="col-4">
                                    <div class="card reservasi-card ruangan">
                                        <div class="card-body text-center">
                                            <svg class="bi mb-3" width="32" height="32" fill="currentColor">
                                                <use xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0">Reservasi Ruangan</h5>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <h5 class="mb-0">Total</h5>
                                                    <p class="mb-0">{{ $jumlahreservasiRuang }}</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="mb-0">Disetujui</h5>
                                                    <p class="mb-0">{{ $jumlahsetujuiRuang }}</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="mb-0">Ditolak</h5>
                                                    <p class="mb-0">{{ $jumlahtolakRuang }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card reservasi-card alat">
                                        <div class="card-body text-center">
                                            <svg class="bi mb-3" width="32" height="32" fill="currentColor">
                                                <use xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0">Reservasi Alat</h5>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <h5 class="mb-0">Total</h5>
                                                    <p class="mb-0">{{ $jumlahreservasiAlat }}</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="mb-0">Disetujui</h5>
                                                    <p class="mb-0">{{ $jumlahsetujuiAlat }}</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="mb-0">Ditolak</h5>
                                                    <p class="mb-0">{{ $jumlahtolakAlat }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card reservasi-card kendaraan">
                                        <div class="card-body text-center">
                                            <svg class="bi mb-3" width="32" height="32" fill="currentColor">
                                                <use xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0">Reservasi Kendaraan</h5>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <h5 class="mb-0">Total</h5>
                                                    <p class="mb-0">{{ $jumlahreservasiKendaraan }}</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="mb-0">Disetujui</h5>
                                                    <p class="mb-0">{{ $jumlahsetujuiKendaraan }}</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="mb-0">Ditolak</h5>
                                                    <p class="mb-0">{{ $jumlahtolakKendaraan }}</p>
                                                </div>
                                            </div>
                                        </div>
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
    </div>

@endsection
