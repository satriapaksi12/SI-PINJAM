<?php

namespace App\Exports;

use App\Models\Reservasi_kendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;

class Reservasi_kendaraansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reservasi_kendaraan::all();
    }
}
