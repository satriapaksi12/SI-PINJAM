<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Jenis_acara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisAcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_jenis_acara' => 'Perkuliahan'],
            ['nama_jenis_acara' => 'Non Perkuliahan'],
        ];

        foreach ($data as $value) {
            Jenis_acara::insert([
                'nama_jenis_acara' => $value ['nama_jenis_acara'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
