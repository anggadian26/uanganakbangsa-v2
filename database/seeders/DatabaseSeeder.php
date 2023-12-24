<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('role')->insert([
            'role' => 'admin'
        ]);
        DB::table('role')->insert([
            'role' => 'pamong'
        ]);
        DB::table('role')->insert([
            'role' => 'siswa'
        ]);


        DB::table('users')->insert([
            'name' => 'Admin Presensi',
            'username' => 'admin',
            'email' => 'admin@default.com',
            'jurusan_id'    => 99,
            'angkatan'      => 99,
            'role_id'       => 1,
            'barcode'       => '12BF45',
            'password' => Hash::make('password123'),
        ]);



    }
}
