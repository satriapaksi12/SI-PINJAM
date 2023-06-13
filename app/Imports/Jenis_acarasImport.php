<?php

namespace App\Imports;

use App\Models\Jenis_acara;
use Maatwebsite\Excel\Concerns\ToModel;

class Jenis_acarasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jenis_acara([
            'nama_jenis_acara'=> $row[0],
        ]);
    }
}
