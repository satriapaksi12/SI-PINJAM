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
            'unit_id'=> $row[4],
            'kegiatan'=> $row[5],
            'tanggal_mulai'=> $row[6],
            'tanggal_selesai'=> $row[7],
            'status'=> $row[8],
            'alasan'=> $row[9],
            'ruang_id'=> $row[10],
            'jenis_acara_id'=> $row[11],
            'periode_id'=> $row[12],
            'user_id'=> $row[13],




        ]);
    }
}
