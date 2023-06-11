<?php

namespace App\Exports;

use App\Models\Alat;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlatsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Alat::all();
    }
}
