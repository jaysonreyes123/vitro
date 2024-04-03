<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('employee_status')->insert([
            [
                "id" => 1,
                "name" => "Regular"
            ],
            [
                "id" => 2,
                "name" => "Not Regular"
            ],
        ]);
    }
}
