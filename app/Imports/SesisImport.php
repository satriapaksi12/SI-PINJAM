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
            'sesi'=> $row[0],
            'hari'=> $row[1],
            'jam_mulai'=> $row[2],
            'jam_selesai'=>$row[3],

        ]);
    }
}
