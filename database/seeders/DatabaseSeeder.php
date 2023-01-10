<?php

namespace Database\Seeders;

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
        DB::table('cabangs')->insert(
            [
                'id' => 1,
                'cabang' => 'Pontianak'
            ]
        );
        DB::table('cabangs')->insert(
            [
                'id' => 2,
                'cabang' => 'Kubu Raya'
            ],
        );
        DB::table('jabatans')->insert(
            [
                'id' => 1,
                'jabatan' => 'CEO'
            ]
        );
        DB::table('jabatans')->insert(
            [
                'id' => 2,
                'jabatan' => 'Teknisi'
            ],
        );
        DB::table('users')->insert(
            [
                'email' => 'example@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Admin',
            ]
        );
        DB::table('users')->insert(
            [
                'email' => 'pegawai@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Pegawai',
            ]
        );
        DB::table('pegawais')->insert(
            [
                'user_id' => 1,
                'nama' => 'Example Name',
                'nip' => '123456789012345678'
            ]
        );
        DB::table('pegawais')->insert(
            [
                'user_id' => 2,
                'nama' => 'Pegawai Name',
                'nip' => '123456789012345679'
            ]
        );
        // \App\Models\User::factory(10)->create();
    }
}
