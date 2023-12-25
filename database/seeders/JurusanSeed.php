<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
            'jurusan_code'  => 'RPL',
            'jurusan_name'  => 'REKAYASA PERANGKAT LUNAK'
        ]);

        DB::table('jurusan')->insert([
            'jurusan_code'  => 'PPLG',
            'jurusan_name'  => 'PENGEMBANGAN PERANGKAT LUNAK BERBASIS GIM'
        ]);
    }
}
