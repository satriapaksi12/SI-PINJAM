<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Jenis_kendaraan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_jenis_kendaraan' => 'mobil'],
            ['nama_jenis_kendaraan' => 'motor'],
            ['nama_jenis_kendaraan' => 'truck'],
            ['nama_jenis_kendaraan' => 'bus'],
            ['nama_jenis_kendaraan' => 'ambulance'],
        ];

        foreach ($data as $value) {
            Jenis_kendaraan::insert([
                'nama_jenis_kendaraan' => $value ['nama_jenis_kendaraan'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
