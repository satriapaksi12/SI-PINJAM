<?php

namespace App\Imports;

use App\Models\Jenis_kendaraan;
use Maatwebsite\Excel\Concerns\ToModel;

class Jenis_kendaraansImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jenis_kendaraan([
            //
        ]);
    }
}
