<?php

namespace App\Imports;

use App\Models\Alat;
use Maatwebsite\Excel\Concerns\ToModel;

class AlatsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alat([
            //
        ]);
    }
}
