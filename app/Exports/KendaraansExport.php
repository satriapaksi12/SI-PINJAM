<?php

namespace App\Exports;

use App\Models\Kendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KendaraansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $kendaraans = Kendaraan::with('gedung.lokasi','jenis_kendaraan')->get();

        $data = $kendaraans->map(function ($kendaraan) {
            return [
                $kendaraan->id,
                $kendaraan->no_polisi,
                $kendaraan->kapasitas,
                $kendaraan->jenis_kendaraan->nama_jenis_kendaraan,
                $kendaraan->gedung->nama_gedung,
                $kendaraan->gedung->lokasi->nama_lokasi,
                $kendaraan->created_at,
                $kendaraan->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'No Polisi',
            'Kapasitas',
            'Jenis Kendaraan',
            'Gedung',
            'Lokasi Kampus',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
