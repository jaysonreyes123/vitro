<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('hr')->insert([
            'firstname' => 'admin',
            'lastname'  => 'admin',
            'username'  => 'admin',
            'password'  => Hash::make('admin')
        ]);
    }
}
