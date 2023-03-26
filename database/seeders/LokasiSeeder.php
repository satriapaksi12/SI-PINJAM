<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_lokasi' => 'Kampus Tirtomoyo'],
            ['nama_lokasi' => 'Kampus Mesen'],
            ['nama_lokasi' => 'Kampus Pabelan'],
            ['nama_lokasi' => 'Kampus Purwosari'],
        ];

        foreach ($data as $value) {
           Lokasi::insert([
                'nama_lokasi' => $value ['nama_lokasi'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
