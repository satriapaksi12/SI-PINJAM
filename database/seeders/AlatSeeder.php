<?php

namespace Database\Seeders;

use App\Models\Alat;
use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_alat' => 'TV', 'no_inventaris' => '02716641261212', 'foto_alat_id' => '1', 'gedung_id' => '1'],
            ['nama_alat' => 'TV', 'no_inventaris' => '02716641261213', 'foto_alat_id' => '1', 'gedung_id' => '1'],
        ];

        foreach ($data as $value) {
            Alat::insert([
                'nama_alat' => $value['nama_alat'],
                'no_inventaris' => $value['no_inventaris'],
                'foto_alat_id' => $value['foto_alat_id'],
                'gedung_id' => $value['gedung_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
