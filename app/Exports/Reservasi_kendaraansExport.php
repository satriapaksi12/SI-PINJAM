<?php

namespace App\Exports;

use App\Models\Reservasi_kendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;

class Reservasi_kendaraansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $reservasi_kendaraans = Reservasi_kendaraan::with('unit', 'kendaraan.gedung.lokasi', 'kendaraan.jenis_kendaraan', 'user')->get();

        $data = $reservasi_kendaraans->map(function ($reservasi_kendaraan) {
            return [
                $reservasi_kendaraan->id,
                $reservasi_kendaraan->no_reservasi,
                $reservasi_kendaraan->penanggung_jawab,
                $reservasi_kendaraan->no_telepon,
                $reservasi_kendaraan->unit->nama_unit,
                $reservasi_kendaraan->kegiatan,
                $reservasi_kendaraan->tanggal_mulai,
                $reservasi_kendaraan->tanggal_selesai,
                $reservasi_kendaraan->jam_mulai,
                $reservasi_kendaraan->jam_selesai,
                $reservasi_kendaraan->status,
                $reservasi_kendaraan->alasan,
                $reservasi_kendaraan->kendaraan->no_polisi,
                $reservasi_kendaraan->kendaraan->jenis_kendaraan->nama_jenis_kendaraan,
                $reservasi_kendaraan->kendaraan->kapasitas,
                $reservasi_kendaraan->kendaraan->gedung->nama_gedung,
                $reservasi_kendaraan->kendaraan->gedung->lokasi->nama_lokasi,
                $reservasi_kendaraan->created_at,
                $reservasi_kendaraan->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'No Reservasi',
            'Penanggung Jawab',
            'No Telepon Penanggung Jawab',
            'Unit Penanggung Jawab',
            'Kegiatan',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Jam Mulai',
            'Jam Selesai',
            'Status',
            'Alasan',
            'No Polisi',
            'Jenis Kendaraan',
            'Kapasitas',
            'Nama Gedung',
            'Lokasi Kampus',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
