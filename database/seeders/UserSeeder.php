<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'SuperAdmin@homedevs.co.id',
            'phone' => '089516116280',
            'role' => 'admin',
            'status' => 'publish',
            'image' => 'test',
            'gender' => 'Laki - Laki',
            'password' => Hash::make('password')
        ]);
    }
}
