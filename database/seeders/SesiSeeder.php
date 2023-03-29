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
            ['sesi' => '1', 'hari' => 'Senin', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'Senin', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'Senin', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'Senin', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'Senin', 'jam_mulai' => '11:10 ', 'jam_selesai' => '12:00 '],
            ['sesi' => '6', 'hari' => 'Senin', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '7', 'hari' => 'Senin', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '8', 'hari' => 'Senin', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '9', 'hari' => 'Senin', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '10', 'hari' => 'Senin', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '11', 'hari' => 'Senin', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '12', 'hari' => 'Senin', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],


            ['sesi' => '1', 'hari' => 'Selasa', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'Selasa', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'Selasa', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'Selasa', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'Selasa', 'jam_mulai' => '11:10 ', 'jam_selesai' => '12:00 '],
            ['sesi' => '6', 'hari' => 'Selasa', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '7', 'hari' => 'Selasa', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '8', 'hari' => 'Selasa', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '9', 'hari' => 'Selasa', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '10', 'hari' => 'Selasa', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '11', 'hari' => 'Selasa', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '12', 'hari' => 'Selasa', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],

            ['sesi' => '1', 'hari' => 'Rabu', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'Rabu', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'Rabu', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'Rabu', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'Rabu', 'jam_mulai' => '11:10 ', 'jam_selesai' => '12:00 '],
            ['sesi' => '6', 'hari' => 'Rabu', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '7', 'hari' => 'Rabu', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '8', 'hari' => 'Rabu', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '9', 'hari' => 'Rabu', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '10', 'hari' => 'Rabu', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '11', 'hari' => 'Rabu', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '12', 'hari' => 'Rabu', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],


            ['sesi' => '1', 'hari' => 'Kamis', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'Kamis', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'Kamis', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'Kamis', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'Kamis', 'jam_mulai' => '11:10 ', 'jam_selesai' => '12:00 '],
            ['sesi' => '6', 'hari' => 'Kamis', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '7', 'hari' => 'Kamis', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '8', 'hari' => 'Kamis', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '9', 'hari' => 'Kamis', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '10', 'hari' => 'Kamis', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '11', 'hari' => 'Kamis', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '12', 'hari' => 'Kamis', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],

            ['sesi' => '1', 'hari' => 'Jumat', 'jam_mulai' => '07.30', 'jam_selesai' => '08.20 '],
            ['sesi' => '2', 'hari' => 'Jumat', 'jam_mulai' => '08.25', 'jam_selesai' => '09.15 '],
            ['sesi' => '3', 'hari' => 'Jumat', 'jam_mulai' => '09:20 ', 'jam_selesai' => '10:10 '],
            ['sesi' => '4', 'hari' => 'Jumat', 'jam_mulai' => '10:15 ', 'jam_selesai' => '11.05 '],
            ['sesi' => '5', 'hari' => 'Jumat', 'jam_mulai' => '13:00', 'jam_selesai' => '13:50'],
            ['sesi' => '6', 'hari' => 'Jumat', 'jam_mulai' => '13:55', 'jam_selesai' => '14:45'],
            ['sesi' => '7', 'hari' => 'Jumat', 'jam_mulai' => '15:30', 'jam_selesai' => '16:20'],
            ['sesi' => '8', 'hari' => 'umat', 'jam_mulai' => '16:25', 'jam_selesai' => '17:15'],
            ['sesi' => '9', 'hari' => 'Jumat', 'jam_mulai' => '17:20', 'jam_selesai' => '18:10'],
            ['sesi' => '10', 'hari' => 'Jumat', 'jam_mulai' => '18:15', 'jam_selesai' => '19:05 '],
            ['sesi' => '11', 'hari' => 'Jumat', 'jam_mulai' => '19:10', 'jam_selesai' => '20:00'],

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
