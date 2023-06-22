<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            ['nama_role' => 'Superadmin'],
            ['nama_role' => 'Admin'],
            ['nama_role' => 'Staff'],
            ['nama_role' => 'Mahasiswa'],
            
        ];

        foreach ($data as $value) {
            Role::insert([
                'nama_role' => $value['nama_role'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

    }
}
