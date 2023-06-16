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
            'nama_ruang'=> $row[0],
            'kapasitas'=> $row[1],
            'fasilitas'=> $row[2],
            'gedung_id'=> $row[3],
            'foto_ruang_id'=> $row[4],
        ]);
    }
}
