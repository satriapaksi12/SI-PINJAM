<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['no_ruang' => '219753567','nama_ruang' => 'Ruangan A', 'kapasitas' => '25', 'fasilitas' => 'tv,LCD,meja,kursi','foto_ruang_id' => '1', 'gedung_id' => '1'],
            ['no_ruang' => '219753568','nama_ruang' => 'Ruangan B', 'kapasitas' => '25', 'fasilitas' => 'tv,LCD,meja,kursi', 'foto_ruang_id' => '2', 'gedung_id' => '1'],
        ];

        foreach ($data as $value) {
            Ruang::insert([
                'no_ruang' => $value['no_ruang'],
                'nama_ruang' => $value['nama_ruang'],
                'kapasitas' => $value['kapasitas'],
                'fasilitas' => $value['fasilitas'],
                'foto_ruang_id' => $value['foto_ruang_id'],
                'gedung_id' => $value['gedung_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
