<?php

namespace App\Exports;

use App\Models\Sesi;
use Maatwebsite\Excel\Concerns\FromCollection;

class SesisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sesi::all();
    }
}
