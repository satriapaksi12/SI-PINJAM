<?php

namespace App\Exports;

use App\Models\Gedung;
use Maatwebsite\Excel\Concerns\FromCollection;

class GedungsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gedung::all();
    }
}
