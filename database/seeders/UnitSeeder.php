<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_unit' => 'Sekolah Vokasi','telepon'=>'082134526737','email' => 'sekolahvokasi@vokasi.uns.ac.id'],
            ['nama_unit' => 'Teknik Fisika','telepon'=>'082134526738','email' => 'fisika@vokasi.uns.ac.id'],
            ['nama_unit' => 'Teknik Kimia','telepon'=>'082134526739','email' => 'kimia@vokasi.uns.ac.id'],
            ['nama_unit' => 'Kebidanan','telepon'=>'082134526735','email' => 'kebidanan@vokasi.uns.ac.id'],
        ];

        foreach ($data as $value) {
           Unit::insert([
                'nama_unit' => $value ['nama_unit'],
                'telepon' => $value ['telepon'],
                'email' => $value ['email'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
