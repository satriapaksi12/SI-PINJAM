<?php

namespace App\Exports;

use App\Models\Kendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KendaraansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kendaraan::all();
    }
}
