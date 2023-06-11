<?php

namespace App\Imports;

use App\Models\Reservasi_ruang;
use Maatwebsite\Excel\Concerns\ToModel;

class Reservasi_ruangsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Reservasi_ruang([
            //
        ]);
    }
}
