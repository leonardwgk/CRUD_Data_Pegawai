<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('employees')->insert([
            'nama' => 'Leonard Wangka',
            'jeniskelamin' => 'Laki-laki',
            'notelpon' => '0812345678',
        ]);
    }
}
