<!doctype html>

<html lang="en">

<head>
    <style>
        body {
            background: #eee;
            margin-top: 20px;
        }

        .text-danger strong {
            color: #9f181c;
        }

        .receipt-main {
            background: #f7fff7 none repeat scroll 0 0;
            border-bottom: 12px solid #ecffee;
            border-top: 12px solid #c6ffb8;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }

        /* bawahnya lumbung desa */
        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }

        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }

        /* garis atas */
        .receipt-main::after {
            background: #b4ffd8 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }

        /*kotak judul kolom */
        .receipt-main thead {
            background: #b6b6bd none repeat scroll 0 0;
        }

        /* tulisan judul kolom */
        .receipt-main thead th {
            color: rgb(9, 9, 9);
        }

        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }

        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }

        .receipt-right p i {
            text-align: center;
            width: 18px;
        }

        .receipt-main td {
            padding: 9px 20px !important;
        }

        .receipt-main th {
            padding: 13px 20px !important;
        }

        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }

        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }

        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }

        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }

        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }

        #container {
            background-color: #dcdcdc;
        }

        table {
            border-collapse: collapse;
            padding: 2px
        }

        table,
        th,
        td {
            border: 1px solid black;
        }



        th {
            background-color: #1252c9;
            color: white;
        }
    </style>
</head>

<body>

    <div class="col-md-12">
        <div class="row">
            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                        <center>
                            <h2>BUKTI RESERVASI SEKOLAH VOKASI UNS</h2>
                        </center>

                <div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div class="receipt-right">
                            <h5>NOMOR RESERVASI</h5>
                            <h3>{{ $reservasi_kendaraan->no_reservasi }}</h3>
                        </div>
                    </div>
                    <center>
                        <table class="table table-bordered" width="700px">
                            <tbody>
                                <tr>
                                    <td width="150px">Nomor Polisi</td>
                                    <td>{{ $reservasi_kendaraan->kendaraan->no_polisi }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kendaraan</td>
                                    <td>{{ $reservasi_kendaraan->kendaraan->jenis_kendaraan->nama_jenis_kendaraan }}</td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>{{ $reservasi_kendaraan->kendaraan->gedung->nama_gedung }} -
                                        {{ $reservasi_kendaraan->kendaraan->gedung->lokasi->nama_lokasi }}</td>
                                </tr>
                                <tr>
                                    <td>Peminjam</td>
                                    <td>{{ Auth::user()->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Penanggung Jawab</td>
                                    <td>{{ $reservasi_kendaraan->penanggung_jawab }}</td>
                                </tr>
                                <tr>
                                    <td>No Telepon Penanggung Jawab</td>
                                    <td>{{ $reservasi_kendaraan->no_telepon }}</td>
                                </tr>
                                <tr>
                                    <td>Unit Penanggung Jawab</td>
                                    <td>{{ $reservasi_kendaraan->unit->nama_unit }}</td>
                                </tr>
                                <tr>
                                    <td>Kegiatan</td>
                                    <td>{{ $reservasi_kendaraan->kegiatan }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai</td>
                                    <td>{{ $reservasi_kendaraan->tanggal_mulai }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Selesai</td>
                                    <td>{{ $reservasi_kendaraan->tanggal_selesai }}</td>
                                </tr>
                                <tr>
                                    <td>Jam Mulai</td>
                                    <td>{{ $reservasi_kendaraan->jam_mulai }}</td>
                                </tr>
                                <tr>
                                    <td>Jam Selesai</td>
                                    <td>{{ $reservasi_kendaraan->jam_selesai }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $reservasi_kendaraan->status }}</td>
                                </tr>
                                <tr>
                                    <td>Alasan Penolakan</td>
                                    <td>{{ $reservasi_kendaraan->alasan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
                <div class="receipt-right">
                    <h5>Hubungi Kami :</h5>
                    <h6>Sekolah Vokasi Universitas Sebelas Maret</h6>
                    <h6>Jl. Kolonel Sutarto 150 K, Jebres, Surakarta, Jawa Tengah</h6>
                    <h6>0271-664126</h6>
                    <h6>vokasi@unit.uns.ac.id</h6>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>










