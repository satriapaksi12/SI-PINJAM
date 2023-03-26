<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Gedung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_gedung' => 'Gedung A','lokasi_id' => '1'],
            ['nama_gedung' => 'Gedung B','lokasi_id' => '1'],
            ['nama_gedung' => 'Gedung A','lokasi_id' => '2'],
            ['nama_gedung' => 'Gedung B','lokasi_id' => '2'],


        ];

        foreach ($data as $value) {
            Gedung::insert([
                'nama_gedung' => $value ['nama_gedung'],
                'lokasi_id' => $value ['lokasi_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
