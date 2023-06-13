<?php

namespace App\Exports;

use App\Models\Gedung;
use Maatwebsite\Excel\Concerns\FromCollection;

class GedungsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        $gedungs = Gedung::with('lokasi')->get();

        $data = $gedungs->map(function ($gedung) {
            return [
                $gedung->id,
                $gedung->nama_gedung,
                $gedung->lokasi->nama_lokasi,
                $gedung->created_at,
                $gedung->updated_at,

            ];
        });

        $data->prepend([
            'ID',
            'Nama Gedung',
            'Lokasi',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
