<?php

namespace App\Http\Controllers;
use App\Models\Distrito;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class DistritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distritos = Distrito::with('concelhos')->orderBy('nome')->get();
        return response()->json($distritos,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function backHome(Request $request){
        
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        $home = $request->home;
        

        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            if($home){
                $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            } else {
                $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            }
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($home and $partida['homeID'] === $time['id']){

                    if($partida['homeGoalCount'] > $partida['awayGoalCount']){
                       $sum = $sum + ($stake*$partida['odds_ft_1']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

                if(!$home and $partida['awayID'] === $time['id']){

                    if($partida['awayGoalCount'] > $partida['homeGoalCount']){
                        $sum = $sum + ($stake*$partida['odds_ft_2']) - $stake;
                     } else {
                        $sum = $sum - $stake;
                     } 

                }

            }

            if($home){

                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'vitorias' => $time['stats']['winPercentage_home'].'%',
                    'empates' => $time['stats']['drawPercentage_home'].'%',
                    'derrotas' => $time['stats']['losePercentage_home'].'%',
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            } else {

                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'vitorias' => $time['stats']['winPercentage_away'].'%',
                    'empates' => $time['stats']['drawPercentage_away'].'%',
                    'derrotas' => $time['stats']['losePercentage_away'].'%',
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            }
            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }
}
