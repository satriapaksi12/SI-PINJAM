<?php

namespace App\Exports;

use App\Models\Jenis_kendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;

class Jenis_kendaraansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jenis_kendaraan::all();
    }
}
