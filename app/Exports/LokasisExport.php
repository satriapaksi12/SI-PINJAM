<?php

namespace App\Exports;

use App\Models\Lokasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class LokasisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lokasi::all();
    }
}
