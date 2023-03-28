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
            ['sesi' => '1', 'hari' => 'senin', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'senin', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'senin', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'senin', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'senin', 'jam_mulai' => '11:10 ', 'jam_selesai' => '12:00 '],
            ['sesi' => '6', 'hari' => 'senin', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '7', 'hari' => 'senin', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '8', 'hari' => 'senin', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '9', 'hari' => 'senin', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '10', 'hari' => 'senin', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '11', 'hari' => 'senin', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '12', 'hari' => 'senin', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],


            ['sesi' => '1', 'hari' => 'selasa', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'selasa', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'selasa', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'selasa', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'selasa', 'jam_mulai' => '11:10 ', 'jam_selesai' => '12:00 '],
            ['sesi' => '6', 'hari' => 'selasa', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '7', 'hari' => 'selasa', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '8', 'hari' => 'selasa', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '9', 'hari' => 'selasa', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '10', 'hari' => 'selasa', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '11', 'hari' => 'selasa', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '12', 'hari' => 'selasa', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],

            ['sesi' => '1', 'hari' => 'rabu', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'rabu', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'rabu', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'rabu', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'rabu', 'jam_mulai' => '11:10 ', 'jam_selesai' => '12:00 '],
            ['sesi' => '6', 'hari' => 'rabu', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '7', 'hari' => 'rabu', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '8', 'hari' => 'rabu', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '9', 'hari' => 'rabu', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '10', 'hari' => 'rabu', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '11', 'hari' => 'rabu', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '12', 'hari' => 'rabu', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],


            ['sesi' => '1', 'hari' => 'kamis', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'kamis', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'kamis', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'kamis', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'kamis', 'jam_mulai' => '11:10 ', 'jam_selesai' => '12:00 '],
            ['sesi' => '6', 'hari' => 'kamis', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '7', 'hari' => 'kamis', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '8', 'hari' => 'kamis', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '9', 'hari' => 'kamis', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '10', 'hari' => 'kamis', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '11', 'hari' => 'kamis', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '12', 'hari' => 'kamis', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],

            ['sesi' => '1', 'hari' => 'jumat', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'jumat', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'jumat', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'jumat', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'jumat', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '6', 'hari' => 'jumat', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '7', 'hari' => 'jumat', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '8', 'hari' => 'jumat', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '9', 'hari' => 'jumat', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '10', 'hari' => 'jumat', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '11', 'hari' => 'jumat', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],

        ];

        foreach ($data as $value) {
            Sesi::insert([
                'sesi' => $value['sesi'],
                'hari' => $value['hari'],
                'jam_mulai' => $value['jam_mulai'],
                'jam_selesai' => $value['jam_selesai'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
