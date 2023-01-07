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
        DB::table('users')->insert([
            'email' => 'example@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Admin',
        ]);
        DB::table('pegawais')->insert([
            'user_id' => 1,
            'nama' => 'Example Name',
            'nip' => '123456789012345678'
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
