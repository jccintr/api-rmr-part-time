<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Açores"
        ]);

        $concelhos = [
            'Angra do Heroísmo',
            'Calheta',
            'Corvo',
            'Horta',
            'Lagoa',
            'Lajes das Flores',
            'Lajes do Pico',
            'Madalena',
            'Nordeste',
            'Ponta Delgada',
            'Povoação',
            'Praia da Vitória',
            'Ribeira Grande',
            'Santa Cruz da Graciosa',
            'Santa Cruz das Flores',
            'São Roque do Pico',
            'Velas',
            'Vila do Porto',
            'Vila Franca do Campo'
          ];

          foreach($concelhos as $concelho){

                DB::table('concelhos')->insert([
                    'nome' => $concelho,
                    'distrito_id' => $idDistrito
                ]);

          }
          

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Aveiro"
        ]);
        $concelhos = [
            'Águeda',
            'Albergaria-a-Velha',
            'Anadia',
            'Arouca',
            'Aveiro',
            'Castelo de Paiva',
            'Espinho',
            'Estarreja',
            'Ílhavo',
            'Mealhada',
            'Murtosa',
            'Oliveira de Azeméis',
            'Oliveira do Bairro',
            'Ovar',
            'Santa Maria da Feira',
            'São João da Madeira',
            'Sever do Vouga',
            'Vagos',
            'Vale de Cambra'
       ];

        foreach($concelhos as $concelho){

            DB::table('concelhos')->insert([
                'nome' => $concelho,
                'distrito_id' => $idDistrito
            ]);

        }


        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Beja"
        ]);

        $concelhos = [
            'Aljustrel',
            'Almodôvar',
            'Alvito',
            'Barrancos',
            'Beja',
            'Castro Verde',
            'Cuba',
            'Ferreira do Alentejo',
            'Mértola',
            'Moura',
            'Odemira',
            'Ourique',
            'Serpa',
            'Vidigueira'
        ];

        foreach($concelhos as $concelho){

            DB::table('concelhos')->insert([
                'nome' => $concelho,
                'distrito_id' => $idDistrito
            ]);

        }


        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Braga"
        ]);

            $concelhos = [
                'Amares',
                'Barcelos',
                'Braga',
                'Cabeceiras de Basto',
                'Celorico de Basto',
                'Esposende',
                'Fafe',
                'Guimarães',
                'Póvoa de Lanhoso',
                'Terras de Bouro',
                'Vieira do Minho',
                'Vila Nova de Famalicão',
                'Vila Verde',
                'Vizela'
            ];

            foreach($concelhos as $concelho){

                DB::table('concelhos')->insert([
                    'nome' => $concelho,
                    'distrito_id' => $idDistrito
                ]);

            }


        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Bragança"
        ]);

            $concelhos = [
                'Alfândega da Fé',
                'Bragança',
                'Carrazeda de Ansiães',
                'Freixo de Espada à Cinta',
                'Macedo de Cavaleiros',
                'Miranda do Douro',
                'Mirandela',
                'Mogadouro',
                'Torre de Moncorvo',
                'Vila Flor',
                'Vimioso',
                'Vinhais'
            ];

            foreach($concelhos as $concelho){

                DB::table('concelhos')->insert([
                    'nome' => $concelho,
                    'distrito_id' => $idDistrito
                ]);

            }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Castelo Branco"
        ]);

            $concelhos = [
                'Belmonte',
                'Castelo Branco',
                'Covilhã',
                'Fundão',
                'Idanha-a-Nova',
                'Oleiros',
                'Penamacor',
                'Proença-a-Nova',
                'Sertã',
                'Vila de Rei',
                'Vila Velha de Ródão'
            ];

                foreach($concelhos as $concelho){

                    DB::table('concelhos')->insert([
                        'nome' => $concelho,
                        'distrito_id' => $idDistrito
                    ]);

                }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Coimbra"
        ]);

                $concelhos = [
                    'Arganil',
                    'Cantanhede',
                    'Coimbra',
                    'Condeixa-a-Nova',
                    'Figueira da Foz',
                    'Góis',
                    'Lousã',
                    'Mira',
                    'Miranda do Corvo',
                    'Montemor-o-Velho',
                    'Oliveira do Hospital',
                    'Pampilhosa da Serra',
                    'Penacova',
                    'Penela',
                    'Soure',
                    'Tábua',
                    'Vila Nova de Poiares'
            ];

            foreach($concelhos as $concelho){

                DB::table('concelhos')->insert([
                    'nome' => $concelho,
                    'distrito_id' => $idDistrito
                ]);

            }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Evora"
        ]);

            $concelhos = [
                'Alandroal',
                'Arraiolos',
                'Borba',
                'Estremoz',
                'Évora',
                'Montemor-o-Novo',
                'Mora',
                'Mourão',
                'Olivença',
                'Portel',
                'Redondo',
                'Reguengos de Monsaraz',
                'Vendas Novas',
                'Viana do Alentejo',
                'Vila Viçosa'
            ];

            foreach($concelhos as $concelho){

                DB::table('concelhos')->insert([
                    'nome' => $concelho,
                    'distrito_id' => $idDistrito
                ]);

            }


        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Faro"
        ]);

                $concelhos = [
                    'Albufeira',
                    'Alcoutim',
                    'Aljezur',
                    'Castro Marim',
                    'Faro',
                    'Lagoa',
                    'Lagos',
                    'Loulé',
                    'Monchique',
                    'Olhão',
                    'Portimão'.
                    'São Brás de Alportel',
                    'Silves',
                    'Tavira',
                    'Vila do Bispo',
                    'Vila Real de Santo António'
                ];

                foreach($concelhos as $concelho){

                    DB::table('concelhos')->insert([
                        'nome' => $concelho,
                        'distrito_id' => $idDistrito
                    ]);

                }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Guarda"
        ]);

                $concelhos = [
                    'Aguiar da Beira',
                    'Almeida',
                    'Celorico da Beira',
                    'Figueira de Castelo Rodrigo',
                    'Fornos de Algodres',
                    'Gouveia',
                    'Guarda',
                    'Manteigas',
                    'Mêda',
                    'Pinhel',
                    'Sabugal',
                    'Seia',
                    'Trancoso',
                    'Vila Nova de Foz Côa'
                ];

                foreach($concelhos as $concelho){

                    DB::table('concelhos')->insert([
                        'nome' => $concelho,
                        'distrito_id' => $idDistrito
                    ]);

                }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Leiria"
        ]);

            $concelhos = [
                'Alcobaça',
                'Alvaiázere',
                'Ansião',
                'Batalha',
                'Bombarral',
                'Caldas da Rainha',
                'Castanheira de Pera',
                'Figueiró dos Vinhos',
                'Leiria',
                'Marinha Grande',
                'Nazaré',
                'Óbidos',
                'Pedrógão Grande',
                'Peniche',
                'Pombal',
                'Porto de Mós'
            ];

            foreach($concelhos as $concelho){

                DB::table('concelhos')->insert([
                    'nome' => $concelho,
                    'distrito_id' => $idDistrito
                ]);

            }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Lisboa"
        ]);

            $concelhos = [
                'Alenquer',
                'Amadora',
                'Arruda dos Vinhos',
                'Azambuja',
                'Cadaval',
                'Cascais',
                'Lisboa',
                'Loures',
                'Lourinhã',
                'Mafra',
                'Odivelas',
                'Oeiras',
                'Sintra',
                'Sobral de Monte Agraço',
                'Torres Vedras',
                'Vila Franca de Xira'
            ];

            foreach($concelhos as $concelho){

                DB::table('concelhos')->insert([
                    'nome' => $concelho,
                    'distrito_id' => $idDistrito
                ]);

            }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Madeira"
        ]);

            $concelhos = [
                'Calheta',
                'Câmara de Lobos',
                'Funchal',
                'Machico',
                'Ponta do Sol',
                'Porto Moniz',
                'Porto Santo',
                'Ribeira Brava',
                'Santa Cruz',
                'Santana',
                'São Vicente'
            ];

                foreach($concelhos as $concelho){

                    DB::table('concelhos')->insert([
                        'nome' => $concelho,
                        'distrito_id' => $idDistrito
                    ]);

                }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Portalegre"
        ]);

            $concelhos = [
                'Alter do Chão',
                'Arronches',
                'Avis',
                'Campo Maior',
                'Castelo de Vide',
                'Crato',
                'Elvas',
                'Fronteira',
                'Gavião',
                'Marvão',
                'Monforte',
                'Nisa',
                'Ponte de Sor',
                'Portalegre',
                'Sousel'
            ];

                foreach($concelhos as $concelho){

                    DB::table('concelhos')->insert([
                        'nome' => $concelho,
                        'distrito_id' => $idDistrito
                    ]);

                }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Porto"
        ]);

            $concelhos = [
                'Amarante',
                'Baião',
                'Felgueiras',
                'Gondomar',
                'Lousada',
                'Maia',
                'Marco de Canaveses',
                'Matosinhos',
                'Paços de Ferreira',
                'Paredes',
                'Penafiel',
                'Porto',
                'Póvoa de Varzim',
                'Santo Tirso',
                'Trofa',
                'Valongo',
                'Vila do Conde',
                'Vila Nova de Gaia'
            ];

                foreach($concelhos as $concelho){

                    DB::table('concelhos')->insert([
                        'nome' => $concelho,
                        'distrito_id' => $idDistrito
                    ]);

                }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Santarém"
        ]);

            $concelhos = [
                'Abrantes',
                'Alcanena',
                'Almeirim',
                'Alpiarça',
                'Benavente',
                'Cartaxo',
                'Chamusca',
                'Constância',
                'Coruche',
                'Entroncamento',
                'Ferreira do Zêzere',
                'Golegã',
                'Mação',
                'Ourém',
                'Rio Maior',
                'Salvaterra de Magos',
                'Santarém',
                'Sardoal',
                'Tomar',
                'Torres Novas',
                'Vila Nova da Barquinha'
            ];

                foreach($concelhos as $concelho){

                    DB::table('concelhos')->insert([
                        'nome' => $concelho,
                        'distrito_id' => $idDistrito
                    ]);

                }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Setúbal"
        ]);

        $concelhos = [
            'Alcácer do Sal',
            'Alcochete',
            'Almada',
            'Barreiro',
            'Grândola',
            'Moita',
            'Montijo',
            'Palmela',
            'Santiago do Cacém',
            'Seixal',
            'Sesimbra',
            'Setúbal',
            'Sines'
         ];


            foreach($concelhos as $concelho){

                DB::table('concelhos')->insert([
                    'nome' => $concelho,
                    'distrito_id' => $idDistrito
                ]);

            }


        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Viana do Castelo"
        ]);

                $concelhos = [
                    'Arcos de Valdevez',
                    'Caminha',
                    'Melgaço',
                    'Monção',
                    'Paredes de Coura',
                    'Ponte da Barca',
                    'Ponte de Lima',
                    'Valença',
                    'Viana do Castelo',
                    'Vila Nova de Cerveira'
                ];

                    foreach($concelhos as $concelho){

                        DB::table('concelhos')->insert([
                            'nome' => $concelho,
                            'distrito_id' => $idDistrito
                        ]);

                    }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Vila Real"
        ]);

            $concelhos = [
                'Alijó',
                'Boticas',
                'Chaves',
                'Mesão Frio',
                'Mondim de Basto',
                'Montalegre',
                'Murça',
                'Peso da Régua',
                'Ribeira de Pena',
                'Sabrosa',
                'Santa Marta de Penaguião',
                'Valpaços',
                'Vila Pouca de Aguiar',
                'Vila Real'
            ];


                foreach($concelhos as $concelho){

                    DB::table('concelhos')->insert([
                        'nome' => $concelho,
                        'distrito_id' => $idDistrito
                    ]);

                }

        $idDistrito = DB::table('distritos')->insertGetid([
            'nome' => "Viseu"
        ]);

        $concelhos = [
            'Armamar',
            'Carregal do Sal',
            'Castro Daire',
            'Cinfães',
            'Lamego',
            'Mangualde',
            'Moimenta da Beira',
            'Mortágua',
            'Nelas',
            'Oliveira de Frades',
            'Penalva do Castelo',
            'Penedono',
            'Resende',
            'Santa Comba Dão',
            'São João da Pesqueira',
            'São Pedro do Sul',
            'Sátão',
            'Sernancelhe',
            'Tabuaço',
            'Tarouca',
            'Tondela',
            'Vila Nova de Paiva',
            'Viseu',
            'Vouzela'
        ];

            foreach($concelhos as $concelho){

                DB::table('concelhos')->insert([
                    'nome' => $concelho,
                    'distrito_id' => $idDistrito
                ]);

            }

        
    }
}
