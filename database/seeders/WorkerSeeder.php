<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $genero = ['h','m'];
        
        $nomes_masculinos = [
            'Paulo Cesar',
            'Marco Antonio',
            'Dorival',
            'Abel',
            'Tiago',
            'Mateus',
            'Carlos',
            'Miguel',
            'Rafael',
            'Isaias'
            ];
        $nomes_femininos = [
            'Marcia',
            'Maria Aparecida',
            'Ana Paula',
            'Elisa',
            'Daniela',
            'Valentina',
            'Marta',
            'Helena',
            'Alice',
            'Maria Julia'
        ];
    }
}
