<?php

namespace App\Imports;

use App\Models\Reservasi_alat;
use Maatwebsite\Excel\Concerns\ToModel;

class Reservasi_alatsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Reservasi_alat([
            //
        ]);
    }
}
