<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kegiatanstableseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatans')->insert([
            [
                'jenis_kegiatan' => 'Ekstrakulikuler',
            ],
            [
                'jenis_kegiatan' => 'Lomba',
            ],
            [
                'jenis_kegiatan' => 'Workshop',
            ],
        ]);
    }
}
