<?php

namespace App\Exports;

use App\Models\Periode;
use Maatwebsite\Excel\Concerns\FromCollection;

class PeriodesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $periodes =  Periode::all();

        $data = $periodes->map(function ($periode) {
            return [
                $periode->tahun_periode,
                $periode->semester,
                $periode->created_at,
                $periode->updated_at,
            ];
        });

        $data->prepend([
            'Tahun Periode',
            'Semester',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
