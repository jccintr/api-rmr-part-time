<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sexo = ['m','f'];
        $unidade = ['hora','diária'];
        
        $nomes_masculinos = [
            'Paulo',
            'Marco',
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
            'Maria',
            'Ana',
            'Elisa',
            'Daniela',
            'Valentina',
            'Marta',
            'Helena',
            'Alice',
            'Julia'
        ];
        $sobrenomes = [
            'Pereira',
            'Silva',
            'Oliveira',
            'Cintra',
            'Ferreira',
            'Martins',
            'Noronha',
            'Rodrigues',
            'Gomes',
            'Azevedo',
            'Almeida',
            'Costa',
            'Souza',
            'Araujo',
            'Ribeiro'
        ];

        

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Auxiliar de Serviços Gerais",
            'imagem' => "imagens/servicos/servicos-gerais.jpg",
           
        ]);

        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }
        
/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Cuidador de Idosos",
            'imagem' => "imagens/servicos/cuidador-idosos.jpg",
           
        ]);

        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }

/**********************************************************/      
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Eletricistas",
            'imagem' => "imagens/servicos/eletricista.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }
/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Fretes e Carretos",
            'imagem' => "imagens/servicos/fretes-carretos.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }

/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Limpeza de Condomínios",
            'imagem' => "imagens/servicos/limpador-condominio.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }
/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Limpeza de Estofados",
            'imagem' => "imagens/servicos/limpador-estofados.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }

/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Limpeza de Fim de Obras",
            'imagem' => "imagens/servicos/limpador-obras.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }

/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Pedreiros",
            'imagem' => "imagens/servicos/pedreiro.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }

/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Pintores",
            'imagem' => "imagens/servicos/pintor.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }
/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Diaristas",
            'imagem' => "imagens/servicos/diarista.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }
/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Jardineiros",
            'imagem' => "imagens/servicos/jardineiro.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }
/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Seguranças",
            'imagem' => "imagens/servicos/seguranca.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }
/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Manicures",
            'imagem' => "imagens/servicos/manicure.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }
/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Piscineiros",
            'imagem' => "imagens/servicos/piscineiro.jpg",
           
        ]);
        for ($i=1;$i<=12;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower($nome).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria,
                'unidade' => $unidade[rand(0,1)],
                'valor' => rand(3,7).'.00'
            ]);

        }
    }
}
