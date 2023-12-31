<?php

namespace App\Exports;

use App\Models\Ruang;
use Maatwebsite\Excel\Concerns\FromCollection;

class RuangsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ruangs = Ruang::with('gedung.lokasi')->get();

        $data = $ruangs->map(function ($ruang) {
            return [
                $ruang->id,
                $ruang->no_ruang,
                $ruang->nama_ruang,
                $ruang->kapasitas,
                $ruang->fasilitas,
                $ruang->gedung->nama_gedung,
                $ruang->gedung->lokasi->nama_lokasi,
                $ruang->created_at,
                $ruang->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'No Ruang',
            'Nama Ruang',
            'Kapasitas',
            'Fasilitas',
            'Gedung',
            'Lokasi Kampus',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
