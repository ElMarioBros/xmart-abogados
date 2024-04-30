<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'role' => '3',
            'email' => 'admin@xmart.rel.red',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin6168'),
        ]);
    }
}
