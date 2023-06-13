<?php

namespace App\Imports;

use App\Models\Periode;
use Maatwebsite\Excel\Concerns\ToModel;

class PeriodesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Periode([
            'tahun_periode'=> $row[0],
            'semester'=> $row[1],
        ]);
    }
}
