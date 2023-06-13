<?php

namespace App\Exports;

use App\Models\Jenis_kendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;

class Jenis_kendaraansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $jenis_kendaraans = Jenis_kendaraan::all();

        $data = $jenis_kendaraans->map(function ($jenis_kendaraan) {
            return [
                $jenis_kendaraan->id,
                $jenis_kendaraan->nama_jenis_kendaraan,
                $jenis_kendaraan->created_at,
                $jenis_kendaraan->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'Nama Jenis Kendaraan',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
