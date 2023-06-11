<?php

namespace App\Imports;

use App\Models\Sesi;
use Maatwebsite\Excel\Concerns\ToModel;

class SesisImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sesi([
            //
        ]);
    }
}
