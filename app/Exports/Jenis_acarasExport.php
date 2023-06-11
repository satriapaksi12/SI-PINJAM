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
        return Jenis_acara::all();
    }
}
