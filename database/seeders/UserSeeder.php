<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'admin',
            'level' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'operator',
            'level' => 'operator',
            'username' => 'operator',
            'password' => Hash::make('operator456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'role' => 'operator',
        ]);

    }
}