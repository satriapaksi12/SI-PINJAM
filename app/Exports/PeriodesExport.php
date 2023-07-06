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
                $periode->id,
                $periode->tahun_periode,
                $periode->semester,
                $periode->status,
                $periode->created_at,
                $periode->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'Tahun Periode',
            'Semester',
            'Status',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
