<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            'percentual_iva' => 23,
            'percentual_cliente' => 5,
            'percentual_profissional' => 20,
            'telefone_whats' => '1936145131'
        ]);
    }
}
