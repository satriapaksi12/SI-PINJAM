<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UnitSeeder::class,
            SesiSeeder::class,
            PeriodeSeeder::class,
            LokasiSeeder::class,
            JenisKendaraanSeeder::class,
            JenisAcaraSeeder::class,
            GedungSeeder::class,
            KendaraanSeeder::class,
            FotoAlatSeeder::class,
            AlatSeeder::class,
            RoleSeeder::class,
            Userseeder::class,
            FotoRuangSeeder::class,
            RuangSeeder::class
        ]);
    }
}
