<?php

namespace App\Imports;

use App\Models\Reservasi_kendaraan;
use Maatwebsite\Excel\Concerns\ToModel;

class Reservasi_kendaraansImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Reservasi_kendaraan([
            'no_reservasi'=> $row[0],
            'penanggung_jawab'=> $row[1],
            'no_telepon'=> $row[2],
            'unit_id'=> $row[3],
            'kegiatan'=> $row[4],
            'tanggal_mulai'=> $row[5],
            'tanggal_selesai'=> $row[6],
            'jam_mulai'=> $row[7],
            'jam_selesai'=> $row[8],
            'status'=> $row[9],
            'alasan'=> $row[10],
            'kendaraan_id'=> $row[11],
            'user_id'=> $row[12],
        ]);
    }
}
