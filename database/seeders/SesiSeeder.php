<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Sesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['sesi' => '1','hari' => 'senin','jam_mulai'=>'08.00 AM','jam_selesai'=>'09.00 AM'],
            ['sesi' => '2','hari' => 'senin','jam_mulai'=>'09.00 AM','jam_selesai'=>'10.00 AM'],
            ['sesi' => '3','hari' => 'senin','jam_mulai'=>'10.00 AM','jam_selesai'=>'11.00 AM'],
            ['sesi' => '4','hari' => 'senin','jam_mulai'=>'12.00 AM','jam_selesai'=>'13.00 AM'],

        ];

        foreach ($data as $value) {
            Sesi::insert([
                'sesi' => $value ['sesi'],
                'hari' => $value ['hari'],
                'jam_mulai' => $value ['jam_mulai'],
                'jam_selesai' => $value ['jam_selesai'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
