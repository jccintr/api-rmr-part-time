<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente_id = DB::table('users')->insertGetid([
            'name' => 'Fausto Silva',
            'email' => 'faustao@gmail.com',
            'password' => Hash::make('123'),
            'role' => 1,
            'concelho_id' => rand(1,200),
            'email_verified_at' =>  date("Y-m-d H:i:s") 
        ]);

        for ($i=1;$i<=10;$i++){
             
            $orcamento_id = DB::table('orcamentos')->insertGetid([
                'user_id' => $cliente_id,
                'categoria_id' => rand(1,14),
                'titulo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'logradouro' => 'Alameda Santos Silva',
                'numero' => '100',
                'distrito_id' => 1,
                'concelho_id' => 1,
                'created_at' =>  date("Y-m-d H:i:s") 
            ]);

            $propostas = rand(0,10);
            for ($j=1;$j<=$propostas;$j++){

                DB::table('propostas')->insert([
                    'orcamento_id'=> $orcamento_id,
                    'user_id' => rand(1,130),
                    'resposta' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'valor' => rand(100,500).'.00',
                    'created_at' =>  date("Y-m-d H:i:s")   
                ]);

            }
            
        }
// =================================================================================================
        $cliente_id = DB::table('users')->insertGetid([
            'name' => 'Cassia Silva',
            'email' => 'cassia@gmail.com',
            'password' => Hash::make('123'),
            'role' => 1,
            'concelho_id' => rand(1,200),
            'email_verified_at' =>  date("Y-m-d H:i:s") 
        ]);
        for ($i=1;$i<=10;$i++){

            $orcamento_id = DB::table('orcamentos')->insertGetid([
                'user_id' => $cliente_id,
                'categoria_id' => rand(1,14),
                'titulo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'logradouro' => 'Alameda Santos Silva',
                'numero' => '100',
                'distrito_id' => 1,
                'concelho_id' => 1,
                'created_at' =>  date("Y-m-d H:i:s") 
            ]);

            $propostas = rand(0,10);
            for ($j=1;$j<=$propostas;$j++){

                DB::table('propostas')->insert([
                    'orcamento_id'=> $orcamento_id,
                    'user_id' => rand(1,130),
                    'resposta' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'valor' => rand(100,500).'.00',
                    'created_at' =>  date("Y-m-d H:i:s")   
                ]);

            }
        
        }
        
// =================================================================================================
        $cliente_id = DB::table('users')->insertGetid([
            'name' => 'Frank Black',
            'email' => 'frank@gmail.com',
            'password' => Hash::make('123'),
            'role' => 1,
            'concelho_id' => rand(1,200),
            'email_verified_at' =>  date("Y-m-d H:i:s") 
        ]);

        for ($i=1;$i<=10;$i++){

            $orcamento_id = DB::table('orcamentos')->insertGetid([
                'user_id' => $cliente_id,
                'categoria_id' => rand(1,14),
                'titulo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'logradouro' => 'Alameda Santos Silva',
                'numero' => '100',
                'distrito_id' => 1,
                'concelho_id' => 1,
                'created_at' =>  date("Y-m-d H:i:s") 
            ]);

            $propostas = rand(0,10);
            for ($j=1;$j<=$propostas;$j++){

                DB::table('propostas')->insert([
                    'orcamento_id'=> $orcamento_id,
                    'user_id' => rand(1,130),
                    'resposta' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'valor' => rand(100,500).'.00',
                    'created_at' =>  date("Y-m-d H:i:s")   
                ]);

            }

        }
        
    }
}
