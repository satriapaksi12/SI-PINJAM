<?php

namespace App\Exports;

use App\Models\Reservasi_ruang;
use Maatwebsite\Excel\Concerns\FromCollection;

class Reservasi_ruangsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reservasi_ruang::all();
    }
}
