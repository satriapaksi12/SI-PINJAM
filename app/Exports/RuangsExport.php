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
        $ruangs = Ruang::with('gedung', 'lokasi')->get();

        $data = $ruangs->map(function ($ruang) {
            return [
                $ruang->id,
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
            'Nama Ruang',
            'Kapasitas',
            'Fasilitas',
            'Email Verified At',
            'Created At',
            'Updated At',
            'Nama Unit',
            'Nama Role',
            'Deleted At',
        ]);

        return $data;
    }
}
