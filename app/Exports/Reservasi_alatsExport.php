<?php

namespace App\Exports;

use App\Models\Reservasi_alat;
use Maatwebsite\Excel\Concerns\FromCollection;

class Reservasi_alatsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $reservasi_alats = Reservasi_alat::with('unit', 'alat.gedung.lokasi','user')->get();

        $data = $reservasi_alats->map(function ($reservasi_alat) {
            return [
                $reservasi_alat->id,
                $reservasi_alat->no_reservasi,
                $reservasi_alat->penanggung_jawab,
                $reservasi_alat->no_telepon,
                $reservasi_alat->unit->nama_unit,
                $reservasi_alat->kegiatan,
                $reservasi_alat->tanggal_mulai,
                $reservasi_alat->tanggal_selesai,
                $reservasi_alat->jam_mulai,
                $reservasi_alat->jam_selesai,
                $reservasi_alat->status,
                $reservasi_alat->alasan,
                $reservasi_alat->alat->no_inventaris,
                $reservasi_alat->alat->nama_alat,
                $reservasi_alat->alat->gedung->nama_gedung,
                $reservasi_alat->alat->gedung->lokasi->nama_lokasi,
                $reservasi_alat->created_at,
                $reservasi_alat->updated_at,
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
            'No Inventaris',
            'Nama Alat',
            'Nama Gedung',
            'Lokasi Kampus',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
