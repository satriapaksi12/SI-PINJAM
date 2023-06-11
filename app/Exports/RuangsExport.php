<?php

namespace App\Exports;

use App\Models\Ruang;
use Maatwebsite\Excel\Concerns\FromCollection;

class RuangsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ruang::all();
    }
}
