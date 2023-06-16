<?php

namespace App\Exports;

use App\Models\Alat;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlatsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $alats = Alat::with('gedung.lokasi')->get();

        $data = $alats->map(function ($alat) {
            return [
                $alat->id,
                $alat->no_inventaris,
                $alat->nama_alat,
                $alat->gedung->nama_gedung,
                $alat->gedung->lokasi->nama_lokasi,
                $alat->created_at,
                $alat->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'No Inventaris',
            'Nama Alat',
            'Gedung',
            'Lokasi Kampus',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
