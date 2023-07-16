@extends('layouts.app2')

@section('title', 'Laporan Reservasi')
@section('fitur', 'LAPORAN RESERVASI')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="" method="GET">
                                <label for="tanggal">Tanggal:</label>
                                <input type="text" name="tanggal" id="tanggal">

                                <label for="bulan">Bulan:</label>
                                <input type="text" name="bulan" id="bulan" >

                                <label for="tahun">Tahun:</label>
                                <input type="text" name="tahun" id="datepicker" >

                                <label for="jenis_kendaraan">Jenis Kendaraan:</label>
                                <select name="jenis_kendaraan" id="jenis_kendaraan">
                                    <option value="Mobil">Mobil</option>
                                    <option value="Motor">Motor</option>
                                </select>

                                <button type="submit">Export</button>
                            </form>

                            <script>
                                $("#datepicker").datepicker({
                                    format: " yyyy",
                                    viewMode: "years",
                                    minViewMode: "years"
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
