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
            //
        ]);
    }
}
