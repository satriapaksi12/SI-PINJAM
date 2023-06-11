<?php

namespace App\Exports;

use App\Models\Reservasi_alat;
use Maatwebsite\Excel\Concerns\FromCollection;

class Reservasi_alatsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reservasi_alat::all();
    }
}
