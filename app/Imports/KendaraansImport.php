<?php

namespace App\Imports;

use App\Models\Kendaraan;
use Maatwebsite\Excel\Concerns\ToModel;

class KendaraansImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kendaraan([
            'no_polisi'=> $row[0],
            'kapasitas'=> $row[1],
            'gedung_id'=> $row[2],
            'jenis_kendaraan_id'=> $row[3],
        ]);
    }
}
