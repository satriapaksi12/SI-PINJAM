<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Foto_ruang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FotoRuangSeeder extends Seeder
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
            Foto_ruang::insert([
                'nama_foto' => $value['nama_foto'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
