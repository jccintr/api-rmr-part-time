<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class ServicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $nomes = [
            'Paulo Cesar',
            'Marco Antonio',
            'Flávio',
            'Dorival',
            'Abel',
            'João Carlos',
            'José Luiz',
            'Tiago',
            'Mateus',
            'Joaquim',
            'Carlos',
            'Miguel',
            'Rafael',
            'Isaias',
            'Carlos Henrique',
            'Marcia',
            'Maria Aparecida',
            'Ana Paula',
            'Elisa',
            'Daniela'
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

        $idServico = DB::table('servicos')->insertGetid([
            'nome' => "Auxiliar de Serviços Gerais",
            'descricao' => "Profissional capacitado para auxiliar em funções diversificadas.",
            'valor_cliente' => 12,
            'valor_profissional' => 10,
            'unidade' => "hora",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "4",
            'imagem' => "imagens/servicos/servicos-gerais.jpg",
           
        ]);

        DB::table('servicos')->insert([
            'nome' => "Cuidador de Idosos",
            'descricao' => "Profissional especializado em ajudar idosos com necessidades básicas como higiene, alimentação, companhia e medicação.",
            'valor_cliente' => 130,
            'valor_profissional' => 110,
            'unidade' => "diária",
            'horario' => "A combinar",
            'periodo_minimo' => "8",
            'imagem' => "imagens/servicos/cuidador-idosos.jpg",
           
        ]);

        DB::table('servicos')->insert([
            'nome' => "Eletricista",
            'descricao' => "Profissional especializado em reparos e instalação de sistemas elétricos.",
            'valor_cliente' => 16,
            'valor_profissional' => 14,
            'unidade' => "hora",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "3",
            'imagem' => "imagens/servicos/eletricista.jpg",
           
        ]);

        DB::table('servicos')->insert([
            'nome' => "Fretes e Carretos",
            'descricao' => "Profissional especializado em transporte de mercadorias e mudanças.",
            'valor_cliente' => 20,
            'valor_profissional' => 18,
            'unidade' => "hora",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "3",
            'imagem' => "imagens/servicos/fretes-carretos.jpg",
           
        ]);

        DB::table('servicos')->insert([
            'nome' => "Limpeza de Condomínios",
            'descricao' => "Profissional especializado na limpeza de condomínios.",
            'valor_cliente' => 16,
            'valor_profissional' => 14,
            'unidade' => "hora",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "4",
            'imagem' => "imagens/servicos/limpador-condominio.jpg",
           
        ]);

        DB::table('servicos')->insert([
            'nome' => "Limpeza de Estofados",
            'descricao' => "Profissional especializado na higienilização  de estofados e colchões.",
            'valor_cliente' => 16,
            'valor_profissional' => 14,
            'unidade' => "hora",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "4",
            'imagem' => "imagens/servicos/limpador-estofados.jpg",
           
        ]);

        DB::table('servicos')->insert([
            'nome' => "Limpeza de Fim de Obras",
            'descricao' => "Profissional especializado na remoção de resíduos de obras diversas.",
            'valor_cliente' => 16,
            'valor_profissional' => 14,
            'unidade' => "hora",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "5",
            'imagem' => "imagens/servicos/limpador-obras.jpg",
           
        ]);

        DB::table('servicos')->insert([
            'nome' => "Pedreiro",
            'descricao' => "Profissional especializado em construir alicerces, levantar paredes,  muros, construções e rebocar estruturas construidas.",
            'valor_cliente' => 120,
            'valor_profissional' => 110,
            'unidade' => "diária",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "0",
            'imagem' => "imagens/servicos/pedreiro.jpg",
           
        ]);

        DB::table('servicos')->insert([
            'nome' => "Pintor",
            'descricao' => "Profissional especializado em construir alicerces, levantar paredes,  muros, construções e rebocar estruturas construidas.",
            'valor_cliente' => 120,
            'valor_profissional' => 110,
            'unidade' => "diária",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "0",
            'imagem' => "imagens/servicos/pintor.jpg",
           
        ]);
        DB::table('servicos')->insert([
            'nome' => "Diarista",
            'descricao' => "Profissional especializado em faxinas em residencias.",
            'valor_cliente' => 120,
            'valor_profissional' => 110,
            'unidade' => "diária",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "0",
            'imagem' => "imagens/servicos/diarista.jpg",
           
        ]);
        DB::table('servicos')->insert([
            'nome' => "Jardineiro",
            'descricao' => "Profissional especializado em manutenção de jardins e poda de árvores.",
            'valor_cliente' => 120,
            'valor_profissional' => 110,
            'unidade' => "diária",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "0",
            'imagem' => "imagens/servicos/jardineiro.jpg",
           
        ]);
        DB::table('servicos')->insert([
            'nome' => "Segurança",
            'descricao' => "Profissional especializado em segurança de estabelecimentos ou eventos.",
            'valor_cliente' => 120,
            'valor_profissional' => 110,
            'unidade' => "diária",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "0",
            'imagem' => "imagens/servicos/seguranca.jpg",
           
        ]);
        DB::table('servicos')->insert([
            'nome' => "Manicure",
            'descricao' => "Profissional especializado em tratamento estético em mãos e pés.",
            'valor_cliente' => 120,
            'valor_profissional' => 110,
            'unidade' => "diária",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "0",
            'imagem' => "imagens/servicos/manicure.jpg",
           
        ]);

        DB::table('servicos')->insert([
            'nome' => "Piscineiro",
            'descricao' => "Profissional especializado em limpeza e manutanção de piscinas.",
            'valor_cliente' => 120,
            'valor_profissional' => 110,
            'unidade' => "diária",
            'horario' => "8h as 17h30min",
            'periodo_minimo' => "0",
            'imagem' => "imagens/servicos/piscineiro.jpg",
           
        ]);

    }
}


/*

	
	
	{
		"id": 2,
		"nome": "Pintor",
		"descricao": "Profissional especializado em preparar e pintar superfícies externas e internas de edifícios e outras obras civis.",
		"valor_cliente": 12000,
		"valor_profissional": 11000,
		"unidade": "diária",
		"horario": "8h as 17h30min",
		"periodo_minimo": "0",
		"imagem": "imagens\/servicos\/0M8vzjUsJ694yzkO6TjkXoFrfe7NOpr9iih1S3vn.jpg",
		"created_at": "2022-11-30T20:58:58.000000Z",
		"updated_at": "2022-11-30T20:58:58.000000Z"
	}
]


*/

