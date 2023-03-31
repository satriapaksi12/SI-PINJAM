<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Foto_alat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotoAlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_foto' => '1',],
            ['nama_foto' => '1',],

        ];

        foreach ($data as $value) {
            Foto_alat::insert([
                'nama_foto' => $value['nama_foto'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
