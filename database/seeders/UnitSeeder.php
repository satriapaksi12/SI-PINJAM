<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_unit' => 'Teknik Informatika'],
            ['nama_unit' => 'Sekolah Vokasi'],
            ['nama_unit' => 'Teknik Sipil'],
            ['nama_unit' => 'Fmipa'],
        ];
        foreach ($data as $value) {
            Unit::insert([
                'nama_unit' => $value ['nama_unit'],
            ]);
        }
    }
}
