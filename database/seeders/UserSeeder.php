<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
            [
                'nik' => '0000000000',
                'name' => 'Administrator',
                'username' => 'lp3itasik',
                'password' => Hash::make('mimin311'),
                'role' => 'admin',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nik' => '0000000001',
                'name' => 'UPPM',
                'username' => 'uppm',
                'password' => Hash::make('uppm311'),
                'role' => 'uppm',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}