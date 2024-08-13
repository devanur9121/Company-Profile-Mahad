<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kategoristableseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            [
                'nama_kategori' => 'Pendidikan',
            ],
            [
                'nama_kategori' => 'Prestasi',
            ],
            [
                'nama_kategori' => 'Lomba',
            ],
        ]);
    }
}
