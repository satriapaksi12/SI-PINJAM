<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['no_polisi' => 'AD 4538 BA','kapasitas' => '5','gedung_id' => '1','jenis_kendaraan_id' => '1'],
            ['no_polisi' => 'AD 4537 BA','kapasitas' => '5','gedung_id' => '2','jenis_kendaraan_id' => '1'],
            ['no_polisi' => 'AD 4536 BA','kapasitas' => '5','gedung_id' => '1','jenis_kendaraan_id' => '1'],
            ['no_polisi' => 'AD 4535 BA','kapasitas' => '5','gedung_id' => '2','jenis_kendaraan_id' => '1'],
            ['no_polisi' => 'AD 4534 BA','kapasitas' => '5','gedung_id' => '1','jenis_kendaraan_id' => '1'],
            ['no_polisi' => 'AD 4533 BA','kapasitas' => '5','gedung_id' => '2','jenis_kendaraan_id' => '1'],
            ['no_polisi' => 'AD 4532 BA','kapasitas' => '5','gedung_id' => '1','jenis_kendaraan_id' => '1'],
            ['no_polisi' => 'AD 4531 BA','kapasitas' => '5','gedung_id' => '2','jenis_kendaraan_id' => '1'],
        ];

        foreach ($data as $value) {
          Kendaraan::insert([
                'no_polisi' => $value ['no_polisi'],
                'kapasitas' => $value ['kapasitas'],
                'gedung_id' => $value ['gedung_id'],
                'jenis_kendaraan_id' => $value ['jenis_kendaraan_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
