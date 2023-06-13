<?php

namespace App\Exports;

use App\Models\Lokasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class LokasisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $lokasis =Lokasi::all();

        $data = $lokasis->map(function ($lokasi) {
            return [
                $lokasi->id,
                $lokasi->nama_lokasi,
                $lokasi->created_at,
                $lokasi->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'Nama Lokasi',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
