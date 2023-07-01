@extends('layouts.app2')

@section('title', 'Cek Jadwal Reservasi Kendaraan')
@section('fitur', 'CEK JADWAL RESERVASI KENDARAAN')
@section('link', '/cek-jadwal-reservasi-kendaraan')
@section('nama link', 'Cek Jadwal Reservasi Kendaraan')


@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                setlocale(LC_TIME, 'id_ID.utf8');
                $bulanIndonesia = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];
                ?>
                <div class="datetime">
                    <center>
                        <div class="date">
                            <b><span style="font-size:20px;" id="hari">day</span></b>
                            <b><span style="font-size:20px;" id="tanggal">00</span></b>
                            <b><span style="font-size:20px;" id="bulan">month</span></b>
                            <b><span style="font-size:20px;" id="tahun">year</span></b>
                        </div>
                        <div class="time">
                            <b><span style="font-size:20px;" id="span"></span></b>
                        </div>
                    </center>
                </div>
                <script type="text/javascript">
                    window.setTimeout("waktu()", 1000);
                    function waktu() {
                        var hari = new Array(7);
                        hari[0] = "Minggu,";
                        hari[1] = "Senin,";
                        hari[2] = "Selasa,";
                        hari[3] = "Rabu,";
                        hari[4] = "Kamis,";
                        hari[5] = "Jumat,";
                        hari[6] = "Sabtu,";
                        var bulan = new Array();
                        bulan[0] = "Januari";
                        bulan[1] = "Februari";
                        bulan[2] = "Maret";
                        bulan[3] = "April";
                        bulan[4] = "Mei";
                        bulan[5] = "Juni";
                        bulan[6] = "Juli";
                        bulan[7] = "Agustus";
                        bulan[8] = "September";
                        bulan[9] = "Oktober";
                        bulan[10] = "November";
                        bulan[11] = "Desember";
                        var waktu = new Date();
                        setTimeout("waktu()", 1000);
                        Number.prototype.pad = function(digits) {
                            for (var n = this.toString(); n.length < digits; n = 0 + n);
                            return n;
                        }
                        document.getElementById("hari").innerHTML = hari[waktu.getDay()];
                        document.getElementById("tanggal").innerHTML = waktu.getDate().pad(2);
                        document.getElementById("bulan").innerHTML = bulan[waktu.getMonth()];
                        document.getElementById("tahun").innerHTML = waktu.getFullYear();
                    }
                </script>
                <script type="text/javascript">
                    var currentTimeDate = new Date();
                </script>
                <script>
                    var span = document.getElementById('span');
                    function time() {
                        var d = new Date();
                        var s = d.getSeconds();
                        var m = d.getMinutes();
                        var h = d.getHours();
                        span.textContent =
                            ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
                    }
                    setInterval(time, 1000);
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Reservasi</th>
                            <th>No Polisi</th>
                            <th>Jenis</th>
                            <th>Kegiatan</th>
                            <th>Tanggal </th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasi_kendaraan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->no_reservasi }}</td>
                                <td>{{ $data->kendaraan->no_polisi }}</td>
                                <td>{{ $data->kendaraan->jenis_kendaraan->nama_jenis_kendaraan }}</td>
                                <td>{{ $data->kegiatan }}</td>
                                <td>{{ strftime('%d', strtotime($data->tanggal_mulai)) }}
                                    {{ $bulanIndonesia[intval(strftime('%m', strtotime($data->tanggal_mulai))) - 1] }}
                                    {{ strftime('%Y', strtotime($data->tanggal_mulai)) }}
                                    -
                                    {{ strftime('%d', strtotime($data->tanggal_selesai)) }}
                                    {{ $bulanIndonesia[intval(strftime('%m', strtotime($data->tanggal_selesai))) - 1] }}
                                    {{ strftime('%Y', strtotime($data->tanggal_selesai)) }}
                                </td>
                                <td>{{ date('H:i', strtotime($data->jam_mulai)) }} - {{ date('H:i', strtotime($data->jam_selesai)) }}</td>
                                <td>
                                    @if ($data->status == 'Proses Validasi')
                                    <span class="badge bg-warning">Proses Validasi</span>
                                    @endif
                                    @if ($data->status == 'Disetujui')
                                    <spbooan class="badge bg-success">Disetujui</spbooan>
                                    @endif
                                    @if ($data->status == 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection





