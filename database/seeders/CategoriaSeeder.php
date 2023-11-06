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
            'descricao' => "Encontre os melhores auxiliares para serviços gerais."
        ]);

        for ($i=1;$i<=10;$i++){

            $genero = 'm'; // $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
               
            ]);

        }
        
/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Cuidador de Idosos",
            'imagem' => "imagens/servicos/cuidador-idosos.jpg",
            'descricao' => "Encontre os melhores profissionais para cuidar de quem você ama."
           
        ]);

        for ($i=1;$i<=10;$i++){

            $genero = 'f'; //$sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
              
            ]);

        }

/**********************************************************/      
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Eletricistas",
            'imagem' => "imagens/servicos/eletricista.jpg",
            'descricao' => "Encontre os melhores eletricistas para pequenos reparos ou instalações complexas."
           
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = 'm'; //$sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
              
            ]);

        }
/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Fretes e Carretos",
            'imagem' => "imagens/servicos/fretes-carretos.jpg",
            'descricao' => "Encontre os melhores motoristas para serviços de frete e carretos."
           
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = 'm'; //$sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
                
            ]);

        }

/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Limpeza de Condomínios",
            'imagem' => "imagens/servicos/limpador-condominio.jpg",
            'descricao' => "Encontre os melhores profissionais para limpeza de condomínios."
           
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
               
            ]);

        }
/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Limpeza de Estofados",
            'imagem' => "imagens/servicos/limpador-estofados.jpg",
            'descricao' => "Encontre os melhores profissionais para limpeza de estofados e similares."
           
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
              
            ]);

        }

/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Limpeza de Fim de Obras",
            'imagem' => "imagens/servicos/limpador-obras.jpg",
            'descricao' => "Encontre os melhores profissionais para serviços de remoção de resíduos de obras em geral."
           
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = 'm'; // $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
               
            ]);

        }

/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Pedreiros",
            'imagem' => "imagens/servicos/pedreiro.jpg",
            'descricao' => "Encontre os melhores pedreiros para reparos em sua moradia ou executar a sua obra."
           
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = 'm'; //$sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
                
            ]);

        }

/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Pintores",
            'imagem' => "imagens/servicos/pintor.jpg",
            'descricao' => "Encontre os melhores profissionais para pintura de teto, paredes internas e externas."
           
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = 'm'; //$sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
                
            ]);

        }
/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Diaristas",
            'imagem' => "imagens/servicos/diarista.jpg",
            'descricao' => "Encontre as melhores diaristas para realizar serviços em sua moradia ou empresa."
           
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = 'f'; //$sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
               
            ]);

        }
/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Jardineiros",
            'imagem' => "imagens/servicos/jardineiro.jpg",
            'descricao' => "Encontre os melhores profissionais de jardinagem para cuidar de seu jardim ou gramado."
           
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = 'm'; // $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
               
            ]);

        }
/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Seguranças",
            'imagem' => "imagens/servicos/seguranca.jpg",
            'descricao' => "Encontre os melhores profissionais de segurança para proteger você, sua famĩlia, seu negócio ou o seu evento."
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = $sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
               
            ]);

        }
/**********************************************************/        
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Manicures",
            'imagem' => "imagens/servicos/manicure.jpg",
            'descricao' => "Encontre as melhores manicures para tratamento dos seus pés e mãos."
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = 'f'; //$sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
                
            ]);

        }
/**********************************************************/
        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Piscineiros",
            'imagem' => "imagens/servicos/piscineiro.jpg",
            'descricao' => "Encontre os melhores profissionais para limpeza e manutenção de sua piscina."
        ]);
        for ($i=1;$i<=10;$i++){

            $genero = 'm'; //$sexo[rand(0,1)];
            if ($genero=='m'){
                $nome = $nomes_masculinos[rand(0,9)];
                $avatar = 'h'.rand(1,5).'.jpg';
            } else {
                $nome = $nomes_femininos[rand(0,9)];
                $avatar = 'm'.rand(1,5).'.jpg';
            }  
            $nome = $nome.' '.$sobrenomes[rand(0,14)];
            $email = strtolower(str_replace(' ','_',$nome)).rand(0,9999).'@gmail.com';
            $worker_id = DB::table('users')->insertGetid([
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('123'),
                'role' => 2,
                'stars' => rand(3, 4).'.'.rand(0, 9),
                'concelho_id' => rand(1,200),
                'avatar' => "imagens/avatar/".$avatar
            ]);

            DB::table('workers')->insert([
                'user_id' => $worker_id,
                'categoria_id' => $idCategoria
               
            ]);

        }
    }
}
