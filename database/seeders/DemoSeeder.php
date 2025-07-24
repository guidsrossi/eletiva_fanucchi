<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->insert([
            ['name' => '1ºA'],
            ['name' => '1ºB'],
            ['name' => '2ºA']
        ]);

        DB::table('electives')->insert([
            ['name' => 'Robótica'],
            ['name' => 'Teatro'],
            ['name' => 'Fotografia']
        ]);
    }
}
