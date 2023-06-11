<?php

namespace App\Exports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;

class UnitsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $units = Unit::all();

        $data = $units->map(function ($unit) {
            return [
                $unit->id,
                $unit->nama_unit,
                $unit->telepon,
                $unit->email,
                $unit->created_at,
                $unit->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'Nama Unit',
            'Telepon',
            'Email',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
