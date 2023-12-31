<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Superadmin','nomor_induk' => '001','email' => 'superadmin@email.com','password' => Hash::make('rahasia'),'unit_id' => '1','role_id' => '1'],
            ['nama' => 'Admin','nomor_induk' => '002','email' => 'admin@email.com','password' => Hash::make('rahasia'),'unit_id' => '2','role_id' => '2'],
            ['nama' => 'Staff','nomor_induk' => '003','email' => 'staff@email.com','password' => Hash::make('rahasia'),'unit_id' => '3','role_id' => '3'],
            ['nama' => 'Mahasiswa','nomor_induk' => '004','email' => 'mahasiswa@email.com','password' => Hash::make('rahasia'),'unit_id' => '4','role_id' => '4'],
        ];

        foreach ($data as $value) {
            User::insert([
                'nama' => $value['nama'],
                'nomor_induk' => $value['nomor_induk'],
                'email' => $value['email'],
                'password' => $value['password'],
                'unit_id' => $value['unit_id'],
                'role_id' => $value['role_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'email_verified_at' => Carbon::now()
            ]);
        }
    }
}
