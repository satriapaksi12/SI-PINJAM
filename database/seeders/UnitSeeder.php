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
            ['nama_unit' => 'Sekolah Vokasi','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Teknik Kimia','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Perpajakan','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Bahasa Inggris','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Teknik Sipil','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Manajemen Perdagangan','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Bahasa Mandarin','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Teknik Informatika','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Manajemen Pemasaran','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Desain Komunikasi Visual','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Teknik Mesin','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Manajemen Bisnis','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Komunikasi Terapan','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Budidaya Ternak','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Keuangan Perbankan','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Usaha Perjalanan Wisata','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Teknologi Hasil Pertanian','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.idvokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Akuntansi','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Manajemen Administrasi','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Agribisnis','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Farmasi','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Perpustakaan','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Kebidanan','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Teknik Informatika PSDKU','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Akuntansi PSDKU','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-3 Teknologi Hasil Pertanian PSDKU','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-4 Keselamatan dan Kesehatan Kerja','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
            ['nama_unit' => 'D-4 Demografi dan Pencatatan Sipil','telepon'=>'0271664126','email' => 'vokasi@unit.uns.ac.id'],
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
