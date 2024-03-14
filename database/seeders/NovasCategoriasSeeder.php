<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NovasCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Babás",
            'imagem' => "imagens/servicos/babas.jpg",
            'descricao' => "Encontre as melhores babás para cuidar de seus anjinhos."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Barbeiros",
            'imagem' => "imagens/servicos/barbeiros.jpg",
            'descricao' => "Encontre os melhores barbeiros na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Cabeleireiras",
            'imagem' => "imagens/servicos/cabeleireiras.jpg",
            'descricao' => "Encontre as melhores cabeleireiras na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Maridos de Aluguel",
            'imagem' => "imagens/servicos/marido.jpg",
            'descricao' => "Encontre os melhores faz de tudo na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Encanadores",
            'imagem' => "imagens/servicos/encanador.jpg",
            'descricao' => "Encontre os melhores encanadores na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Marceneiros",
            'imagem' => "imagens/servicos/marceneiro.jpg",
            'descricao' => "Encontre os melhores marceneiros na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Serralheiros",
            'imagem' => "imagens/servicos/serralheiro.jpg",
            'descricao' => "Encontre os melhores serralheiros na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Chaveiros",
            'imagem' => "imagens/servicos/chaveiros.jpg",
            'descricao' => "Encontre os melhores chaveiros na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Montadores de Móveis",
            'imagem' => "imagens/servicos/montador.jpg",
            'descricao' => "Encontre os melhores montadores de móveis na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Motoristas",
            'imagem' => "imagens/servicos/motoristas.jpg",
            'descricao' => "Encontre os melhores motoristas na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Detetives Particulares",
            'imagem' => "imagens/servicos/detetives.jpg",
            'descricao' => "Encontre os melhores detetives particulares na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Vidraceiros",
            'imagem' => "imagens/servicos/vidraceiros.jpg",
            'descricao' => "Encontre os melhores vidraceiros na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Gesseiros",
            'imagem' => "imagens/servicos/gesseiros.jpg",
            'descricao' => "Encontre os melhores gesseiros na sua região."
        ]);

        $idCategoria = DB::table('categorias')->insertGetid([
            'nome' => "Confeiteiros",
            'imagem' => "imagens/servicos/confeiteiros.jpg",
            'descricao' => "Encontre os melhores confeiteiros na sua região."
        ]);
    }
}
