<?php

namespace App\Exports;

use App\Models\Jenis_acara;
use Maatwebsite\Excel\Concerns\FromCollection;

class Jenis_acarasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $jenis_acaras = Jenis_acara::all();

        $data = $jenis_acaras->map(function ($jenis_acara) {
            return [
                $jenis_acara->id,
                $jenis_acara->nama_jenis_acara,
                $jenis_acara->created_at,
                $jenis_acara->updated_at,
            ];
        });

        $data->prepend([
            'ID',
            'Nama Jenis Acara',
            'Created At',
            'Updated At',
        ]);

        return $data;
    }
}
