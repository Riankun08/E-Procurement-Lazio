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
            'id' => Str::uuid(),
            'name' => 'Super Admin',
            'email' => 'admin@riandevs.co.id',
            'phone' => '088219612668',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);
    }
}
