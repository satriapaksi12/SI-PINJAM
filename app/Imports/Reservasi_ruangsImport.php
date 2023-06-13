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
            'no_reservasi'=> $row[0],
            'kelas'=> $row[1],
            'penanggung_jawab'=> $row[2],
            'no_telepon'=> $row[3],
            'kegiatan'=> $row[4],
            'tanggal_mulai'=> $row[5],
            'tanggal_selesai'=> $row[6],
            'status'=> $row[7],
            'alasan'=> $row[8],
            'unit_id'=> $row[9],
            'user_id'=> $row[10],
            'ruang_id'=> $row[11],
            'jenis_acara_id'=> $row[12],
            'periode_id'=> $row[13],

        ]);
    }
}
