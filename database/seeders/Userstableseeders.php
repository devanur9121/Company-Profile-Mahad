<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Userstableseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_lengkap' => 'Ravela',
            'username' => '203140914111092',
            'email' => 'ravelaokt@gmail.com',
            'password' => Hash::make('ravel')
        ]);
    }
}
