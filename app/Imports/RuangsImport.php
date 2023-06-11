<?php

namespace App\Imports;

use App\Models\Ruang;
use Maatwebsite\Excel\Concerns\ToModel;

class RuangsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ruang([
            //
        ]);
    }
}
