<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class Agama extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agama52')->insert([
            ['nama_agama' => 'Islam'],
            ['nama_agama' => 'Kristen'],
            ['nama_agama' => 'Hindu'],
            ['nama_agama' => 'Buddha'],
            ['nama_agama' => 'Konghucu'],
        ]);
    }
}
