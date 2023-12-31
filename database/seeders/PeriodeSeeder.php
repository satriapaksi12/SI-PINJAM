<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Periode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tahun_periode' => '2020','semester' => 'Ganjil','status' => 'Aktif'],
            ['tahun_periode' => '2020','semester' => 'Genap','status' => 'Non Aktif'],
            ['tahun_periode' => '2021','semester' => 'Ganjil','status' => 'Non Aktif'],
            ['tahun_periode' => '2021','semester' => 'Genap','status' => 'Non Aktif'],
            ['tahun_periode' => '2022','semester' => 'Ganjil','status' => 'Non Aktif'],
            ['tahun_periode' => '2022','semester' => 'Genap','status' => 'Non Aktif'],

        ];

        foreach ($data as $value) {
           Periode::insert([
                'tahun_periode' => $value ['tahun_periode'],
                'semester' => $value ['semester'],
                'status' => $value ['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
