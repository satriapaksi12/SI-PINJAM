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
            'no_ruang'=> $row[0],
            'nama_ruang'=> $row[1],
            'kapasitas'=> $row[2],
            'fasilitas'=> $row[3],
            'gedung_id'=> $row[4],
            'foto_ruang_id'=> $row[5],
        ]);
    }
}
