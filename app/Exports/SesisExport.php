<?php

namespace App\Exports;

use App\Models\Sesi;
use Maatwebsite\Excel\Concerns\FromCollection;

class SesisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sesis =  Sesi::all();
        $data = $sesis->map(function ($sesi) {
            return [
                $sesi->id,
                $sesi->sesi,
                $sesi->hari,
                $sesi->jam_mulai,
                $sesi->jam_selesai,
                $sesi->created_at,
                $sesi->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'Sesi',
            'Hari',
            'Jam Mulai',
            'Jam Selesai',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
