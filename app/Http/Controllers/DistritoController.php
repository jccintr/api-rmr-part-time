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

    public function backHomeCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){

                    if($partida['homeGoalCount'] > $partida['awayGoalCount']){
                       $sum = $sum + ($stake*$partida['odds_ft_1']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_vitorias' => $time['stats']['winPercentage_home'],
                    'percentual_empates' => $time['stats']['drawPercentage_home'],
                    'percentual_derrotas' => $time['stats']['losePercentage_home'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backHomeVisitante(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if($partida['homeGoalCount'] > $partida['awayGoalCount']){
                       $sum = $sum + ($stake*$partida['odds_ft_1']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_vitorias' => $time['stats']['winPercentage_away'],
                    'percentual_empates' => $time['stats']['drawPercentage_away'],
                    'percentual_derrotas' => $time['stats']['losePercentage_away'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());

    }

    public function backDrawCasa(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){

                    if($partida['homeGoalCount'] === $partida['awayGoalCount']){
                       $sum = $sum + ($stake*$partida['odds_ft_x']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_vitorias' => $time['stats']['winPercentage_home'],
                    'percentual_empates' => $time['stats']['drawPercentage_home'],
                    'percentual_derrotas' => $time['stats']['losePercentage_home'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
        

    }

    public function backDrawVisitante(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if($partida['homeGoalCount'] === $partida['awayGoalCount']){
                       $sum = $sum + ($stake*$partida['odds_ft_x']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_vitorias' => $time['stats']['winPercentage_away'],
                    'percentual_empates' => $time['stats']['drawPercentage_away'],
                    'percentual_derrotas' => $time['stats']['losePercentage_away'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
        

    }

    public function backAwayCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){

                    if($partida['homeGoalCount'] < $partida['awayGoalCount']){
                       $sum = $sum + ($stake*$partida['odds_ft_2']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_vitorias' => $time['stats']['winPercentage_home'],
                    'percentual_empates' => $time['stats']['drawPercentage_home'],
                    'percentual_derrotas' => $time['stats']['losePercentage_home'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backAwayVisitante(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if($partida['homeGoalCount'] < $partida['awayGoalCount']){
                       $sum = $sum + ($stake*$partida['odds_ft_2']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_vitorias' => $time['stats']['winPercentage_away'],
                    'percentual_empates' => $time['stats']['drawPercentage_away'],
                    'percentual_derrotas' => $time['stats']['losePercentage_away'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backOverCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        $over = $request->over;
        
        if($request->over==0.5){
             $odds = 'odds_ft_over05';
        }
        if($request->over==1.5){
            $odds = 'odds_ft_over15';
        }
        if($request->over==2.5){
            $odds = 'odds_ft_over25';
        }
        if($request->over==3.5){
            $odds = 'odds_ft_over35';
        }
        if($request->over==4.5){
            $odds = 'odds_ft_over45';
        }
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){

                    if($partida['totalGoalCount'] >= round($over,0)){
                        $sum = $sum + ($stake*$partida[$odds]) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_over_05' => $time['stats']['seasonOver05Percentage_overall'],
                    'percentual_over_15' => $time['stats']['seasonOver15Percentage_overall'],
                    'percentual_over_25' => $time['stats']['seasonOver25Percentage_overall'],
                    'percentual_over_35' => $time['stats']['seasonOver35Percentage_overall'],
                    'percentual_over_45' => $time['stats']['seasonOver45Percentage_overall'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backOverVisitante(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        $over = $request->over;
        
        if($request->over==0.5){
             $odds = 'odds_ft_over05';
        }
        if($request->over==1.5){
            $odds = 'odds_ft_over15';
        }
        if($request->over==2.5){
            $odds = 'odds_ft_over25';
        }
        if($request->over==3.5){
            $odds = 'odds_ft_over35';
        }
        if($request->over==4.5){
            $odds = 'odds_ft_over45';
        }
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if($partida['totalGoalCount'] >= round($over,0)){
                        $sum = $sum + ($stake*$partida[$odds]) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_over_05' => $time['stats']['seasonOver05Percentage_overall'],
                    'percentual_over_15' => $time['stats']['seasonOver15Percentage_overall'],
                    'percentual_over_25' => $time['stats']['seasonOver25Percentage_overall'],
                    'percentual_over_35' => $time['stats']['seasonOver35Percentage_overall'],
                    'percentual_over_45' => $time['stats']['seasonOver45Percentage_overall'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backUnderCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        $under = $request->under * 1;
        
        if($request->under==0.5){
             $odds = 'odds_ft_under05';
        }
        if($request->under==1.5){
            $odds = 'odds_ft_under15';
        }
        if($request->under==2.5){
            $odds = 'odds_ft_under25';
        }
        if($request->under==3.5){
            $odds = 'odds_ft_under35';
        }
        if($request->under==4.5){
            $odds = 'odds_ft_under45';
        }
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){

                    if($partida['totalGoalCount'] < $under){
                        $sum = $sum + ($stake*$partida[$odds]) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_under_05' => $time['stats']['seasonOver05Percentage_overall'],
                    'percentual_under_15' => $time['stats']['seasonOver15Percentage_overall'],
                    'percentual_under_25' => $time['stats']['seasonOver25Percentage_overall'],
                    'percentual_under_35' => $time['stats']['seasonOver35Percentage_overall'],
                    'percentual_under_45' => $time['stats']['seasonOver45Percentage_overall'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backUnderVisitante(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        $under = $request->under * 1;
        
        if($request->under==0.5){
             $odds = 'odds_ft_under05';
        }
        if($request->under==1.5){
            $odds = 'odds_ft_under15';
        }
        if($request->under==2.5){
            $odds = 'odds_ft_under25';
        }
        if($request->under==3.5){
            $odds = 'odds_ft_under35';
        }
        if($request->under==4.5){
            $odds = 'odds_ft_under45';
        }
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if($partida['totalGoalCount'] < $under){
                        $sum = $sum + ($stake*$partida[$odds]) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_under_05' => $time['stats']['seasonOver05Percentage_overall'],
                    'percentual_under_15' => $time['stats']['seasonOver15Percentage_overall'],
                    'percentual_under_25' => $time['stats']['seasonOver25Percentage_overall'],
                    'percentual_under_35' => $time['stats']['seasonOver35Percentage_overall'],
                    'percentual_under_45' => $time['stats']['seasonOver45Percentage_overall'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backBTTSCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){

                    if($partida['homeGoalCount'] >= 1 and $partida['awayGoalCount'] >= 1){
                       $sum = $sum + ($stake*$partida['odds_btts_yes']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_cs' => $time['stats']['seasonCSPercentage_overall'],
                    'percentual_am' => $time['stats']['seasonBTTSPercentage_overall'],
                    'percentual_fts' => $time['stats']['seasonFTSPercentage_overall'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backBTTSVisitante(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if($partida['homeGoalCount'] >= 1 and $partida['awayGoalCount'] >= 1){
                       $sum = $sum + ($stake*$partida['odds_btts_yes']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_cs' => $time['stats']['seasonCSPercentage_overall'],
                    'percentual_am' => $time['stats']['seasonBTTSPercentage_overall'],
                    'percentual_fts' => $time['stats']['seasonFTSPercentage_overall'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backBTTNCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){
                    if(($partida['homeGoalCount'] == 0 xor $partida['awayGoalCount'] == 0) or $partida['totalGoalCount'] == 0){
                       $sum = $sum + ($stake*$partida['odds_btts_no']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_cs' => $time['stats']['seasonCSPercentage_overall'],
                    'percentual_am' => $time['stats']['seasonBTTSPercentage_overall'],
                    'percentual_fts' => $time['stats']['seasonFTSPercentage_overall'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function backBTTNVisitante(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if(($partida['homeGoalCount'] == 0 xor $partida['awayGoalCount'] == 0) or $partida['totalGoalCount'] == 0){
                       $sum = $sum + ($stake*$partida['odds_btts_no']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_cs' => $time['stats']['seasonCSPercentage_overall'],
                    'percentual_am' => $time['stats']['seasonBTTSPercentage_overall'],
                    'percentual_fts' => $time['stats']['seasonFTSPercentage_overall'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function layHomeCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){

                    if(($partida['homeGoalCount'] == $partida['awayGoalCount']) or ($partida['awayGoalCount'] > $partida['homeGoalCount'])){
                       // VALOR STAKE/((VALOR ODD HOME+0,03)-1)
                        $sum = $sum + ( $stake / ( $partida['odds_ft_1'] + 0.03 - 1 ) ); //- $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_vitorias' => $time['stats']['winPercentage_home'],
                    'percentual_empates' => $time['stats']['drawPercentage_home'],
                    'percentual_derrotas' => $time['stats']['losePercentage_home'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function layHomeVisitante(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if(($partida['homeGoalCount'] == $partida['awayGoalCount']) or ($partida['awayGoalCount'] > $partida['homeGoalCount'])){
                        $sum = $sum + ( $stake / ( $partida['odds_ft_1'] + 0.03 - 1 ) ); //- $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_vitorias' => $time['stats']['winPercentage_away'],
                    'percentual_empates' => $time['stats']['drawPercentage_away'],
                    'percentual_derrotas' => $time['stats']['losePercentage_away'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());

    }

    public function layDrawCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){
                    if($partida['totalGoalCount'] > 0 and ($partida['awayGoalCount'] != $partida['homeGoalCount']) ){
                        $sum = $sum + ( $stake / ( $partida['odds_ft_x'] + 0.03 - 1 ) ); //- $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_vitorias' => $time['stats']['winPercentage_home'],
                    'percentual_empates' => $time['stats']['drawPercentage_home'],
                    'percentual_derrotas' => $time['stats']['losePercentage_home'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function layDrawVisitante(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if($partida['totalGoalCount'] > 0 and ($partida['awayGoalCount'] != $partida['homeGoalCount']) ){
                        $sum = $sum + ( $stake / ( $partida['odds_ft_x'] + 0.03 - 1 ) ); //- $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_vitorias' => $time['stats']['winPercentage_away'],
                    'percentual_empates' => $time['stats']['drawPercentage_away'],
                    'percentual_derrotas' => $time['stats']['losePercentage_away'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());

    }

    public function layAwayCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){
                    if(($partida['awayGoalCount'] == $partida['homeGoalCount']) or ($partida['homeGoalCount'] > $partida['awayGoalCount'] ) ){
                        $sum = $sum + ( $stake / ( $partida['odds_ft_2'] + 0.03 - 1 ) ); //- $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_vitorias' => $time['stats']['winPercentage_home'],
                    'percentual_empates' => $time['stats']['drawPercentage_home'],
                    'percentual_derrotas' => $time['stats']['losePercentage_home'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());
    }

    public function layAwayVisitante(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
            

            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                   
                        if(($partida['awayGoalCount'] == $partida['homeGoalCount']) or ($partida['homeGoalCount'] > $partida['awayGoalCount'] ) ){
                            $sum = $sum + ( $stake / ( $partida['odds_ft_2'] + 0.03 - 1 ) ); //- $stake;
                        } else {
                           $sum = $sum - $stake;
                        } 
                   
                } 

               
            }

           
                $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_vitorias' => $time['stats']['winPercentage_away'],
                    'percentual_empates' => $time['stats']['drawPercentage_away'],
                    'percentual_derrotas' => $time['stats']['losePercentage_away'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];

            

            array_push($arrTimes,$record); 

        }
        return response()->json($arrTimes,$response->status());

    }

    public function doubleChance1xCasa(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
      
            foreach ($json_partidas['data'] as $partida){
                 
                if($partida['homeID'] === $time['id']){

                    if(($partida['homeGoalCount'] == $partida['awayGoalCount']) or ($partida['homeGoalCount'] > $partida['awayGoalCount'] )){
                        dd($partida['id']);  
                        $sum = $sum + ($stake/$partida['odds_doublechance_1x']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 
               
            }
             $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_vitorias' => $time['stats']['winPercentage_home'],
                    'percentual_empates' => $time['stats']['drawPercentage_home'],
                    'percentual_derrotas' => $time['stats']['losePercentage_home'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];
            array_push($arrTimes,$record); 
        }
        return response()->json($arrTimes,$response->status());


    }

    public function doubleChance1xVisitante(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
      
            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if(($partida['homeGoalCount'] == $partida['awayGoalCount']) or ($partida['homeGoalCount'] > $partida['awayGoalCount'] )){
                        $sum = $sum + ($stake/$partida['odds_doublechance_1x']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 
               
            }
             $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_vitorias' => $time['stats']['winPercentage_away'],
                    'percentual_empates' => $time['stats']['drawPercentage_away'],
                    'percentual_derrotas' => $time['stats']['losePercentage_away'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];
            array_push($arrTimes,$record); 
        }
        return response()->json($arrTimes,$response->status());


    }

    public function doubleChance12Casa(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
      
            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){

                    if(($partida['homeGoalCount'] < $partida['awayGoalCount']) or ($partida['homeGoalCount'] > $partida['awayGoalCount'] )){
                        $sum = $sum + ($stake/$partida['odds_doublechance_12']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 
               
            }
             $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_vitorias' => $time['stats']['winPercentage_home'],
                    'percentual_empates' => $time['stats']['drawPercentage_home'],
                    'percentual_derrotas' => $time['stats']['losePercentage_home'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];
            array_push($arrTimes,$record); 
        }
        return response()->json($arrTimes,$response->status());


    }

    public function doubleChance12Visitante(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
      
            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if(($partida['homeGoalCount'] < $partida['awayGoalCount']) or ($partida['homeGoalCount'] > $partida['awayGoalCount'] )){
                        $sum = $sum + ($stake/$partida['odds_doublechance_12']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 
               
            }
             $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_vitorias' => $time['stats']['winPercentage_away'],
                    'percentual_empates' => $time['stats']['drawPercentage_away'],
                    'percentual_derrotas' => $time['stats']['losePercentage_away'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];
            array_push($arrTimes,$record); 
        }
        return response()->json($arrTimes,$response->status());


    }

    public function doubleChancex2Casa(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'homeID') )[$time['id']];
      
            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['homeID'] === $time['id']){

                    if(($partida['homeGoalCount'] < $partida['awayGoalCount']) or ($partida['homeGoalCount'] === $partida['awayGoalCount'] )){
                        $sum = $sum + ($stake/$partida['odds_doublechance_x2']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 
               
            }
             $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_home'],
                    'percentual_vitorias' => $time['stats']['winPercentage_home'],
                    'percentual_empates' => $time['stats']['drawPercentage_home'],
                    'percentual_derrotas' => $time['stats']['losePercentage_home'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];
            array_push($arrTimes,$record); 
        }
        return response()->json($arrTimes,$response->status());


    }

    public function doubleChancex2Visitante(Request $request){

        $stake = $request->stake * 1;
        $season = $request->season * 1;
      
        $response = Http::get('https://api.football-data-api.com/league-teams?key=example&season_id='.$season.'&include=stats');
        $json_times = $response->json();
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrTimes = [];

        foreach ($json_times['data'] as $time){
          
            $sum = 0;
            $num_partidas = array_count_values( array_column( $json_partidas['data'], 'awayID') )[$time['id']];
      
            foreach ($json_partidas['data'] as $partida){
                   
                if($partida['awayID'] === $time['id']){

                    if(($partida['homeGoalCount'] < $partida['awayGoalCount']) or ($partida['homeGoalCount'] === $partida['awayGoalCount'] )){
                        $sum = $sum + ($stake/$partida['odds_doublechance_x2']) - $stake;
                    } else {
                       $sum = $sum - $stake;
                    } 
                } 
               
            }
             $record = [
                    'temporada' => $time['season'],
                    'pais' => $time['country'],
                    'imagem'=> $time['image'],
                    'equipe'=> $time['cleanName'],
                    'partidas' => $time['stats']['seasonMatchesPlayed_away'],
                    'percentual_vitorias' => $time['stats']['winPercentage_away'],
                    'percentual_empates' => $time['stats']['drawPercentage_away'],
                    'percentual_derrotas' => $time['stats']['losePercentage_away'],
                    'lucro' => round($sum,2),
                    'roi' => round($sum/$num_partidas,2)
                ];
            array_push($arrTimes,$record); 
        }
        return response()->json($arrTimes,$response->status());


    }

    // ================================================

     public function leagueBackHomeCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrData = [];

        $sum = 0;
        $partidas = 0;
        $vitorias = 0;
        $empates = 0;
        $derrotas = 0;
        foreach ($json_partidas['data'] as $partida){
            
                if($partida['homeGoalCount'] > $partida['awayGoalCount']){
                    $sum = $sum + ($stake*$partida['odds_ft_1']) - $stake;
                    $vitorias++;
                } else {

                    if($partida['homeGoalCount'] === $partida['awayGoalCount']){ 
                        $empates++;
                    } else {
                        $derrotas++;
                    }
                    $sum = $sum - $stake;
                } 
                $partidas++;
            
        }
        $record = [
            'temporada' => '2018/2019',
            'pais' => 'England',
            'percentual_partidas' => 100,
            'percentual_vitorias' => round($vitorias/$partidas*100,2),
            'percentual_empates' => round($empates/$partidas*100,2),
            'percentual_derrotas' => round($derrotas/$partidas*100,2),
            'lucro' => round($sum,2),
            'roi' => round($sum/$partidas,2)
        ];
        array_push($arrData,$record); 
        return response()->json($arrData,$response->status());
    }

    public function leagueBackHomeVisitante(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrData = [];

        $sum = 0;
        $partidas = 0;
        $vitorias = 0;
        $empates = 0;
        $derrotas = 0;
        foreach ($json_partidas['data'] as $partida){
            
                if($partida['homeGoalCount'] > $partida['awayGoalCount']){
                    $sum = $sum + ($stake*$partida['odds_ft_1']) - $stake;
                    $derrotas++;
                } else {

                    if($partida['homeGoalCount'] === $partida['awayGoalCount']){ 
                        $empates++;
                    } else {
                        $vitorias++;
                    }
                    $sum = $sum - $stake;
                } 
                $partidas++;
            
        }
        $record = [
            'temporada' => '2018/2019',
            'pais' => 'England',
            'percentual_partidas' => 100,
            'percentual_vitorias' => round($vitorias/$partidas*100,2),
            'percentual_empates' => round($empates/$partidas*100,2),
            'percentual_derrotas' => round($derrotas/$partidas*100,2),
            'lucro' => round($sum,2),
            'roi' => round($sum/$partidas,2)
        ];
        array_push($arrData,$record); 
        return response()->json($arrData,$response->status());
    }

    public function leagueBackDrawCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrData = [];

        $sum = 0;
        $partidas = 0;
        $vitorias = 0;
        $empates = 0;
        $derrotas = 0;
        foreach ($json_partidas['data'] as $partida){
            
            if($partida['homeGoalCount'] === $partida['awayGoalCount']){ 
                    $sum = $sum + ($stake*$partida['odds_ft_x']) - $stake;
                    $empates++;
                } else {

                    if($partida['homeGoalCount'] > $partida['awayGoalCount']){ 
                        $vitorias++;
                    } else {
                        $derrotas++;
                    }
                    $sum = $sum - $stake;
                } 
                $partidas++;
            
        }
        $record = [
            'temporada' => '2018/2019',
            'pais' => 'England',
            'percentual_partidas' => 100,
            'percentual_vitorias' => round($vitorias/$partidas*100,2),
            'percentual_empates' => round($empates/$partidas*100,2),
            'percentual_derrotas' => round($derrotas/$partidas*100,2),
            'lucro' => round($sum,2),
            'roi' => round($sum/$partidas,2)
        ];
        array_push($arrData,$record); 
        return response()->json($arrData,$response->status());
    }

    public function leagueBackDrawVisitante(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrData = [];

        $sum = 0;
        $partidas = 0;
        $vitorias = 0;
        $empates = 0;
        $derrotas = 0;
        foreach ($json_partidas['data'] as $partida){
            
            if($partida['homeGoalCount'] === $partida['awayGoalCount']){ 
                    $sum = $sum + ($stake*$partida['odds_ft_x']) - $stake;
                    $empates++;
                } else {

                    if($partida['homeGoalCount'] < $partida['awayGoalCount']){ 
                        $vitorias++;
                    } else {
                        $derrotas++;
                    }
                    $sum = $sum - $stake;
                } 
                $partidas++;
            
        }
        $record = [
            'temporada' => '2018/2019',
            'pais' => 'England',
            'percentual_partidas' => 100,
            'percentual_vitorias' => round($vitorias/$partidas*100,2),
            'percentual_empates' => round($empates/$partidas*100,2),
            'percentual_derrotas' => round($derrotas/$partidas*100,2),
            'lucro' => round($sum,2),
            'roi' => round($sum/$partidas,2)
        ];
        array_push($arrData,$record); 
        return response()->json($arrData,$response->status());
    }

    public function leagueBackAwayCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrData = [];

        $sum = 0;
        $partidas = 0;
        $vitorias = 0;
        $empates = 0;
        $derrotas = 0;
        foreach ($json_partidas['data'] as $partida){
            
              if($partida['homeGoalCount'] < $partida['awayGoalCount']){
                    $sum = $sum + ($stake*$partida['odds_ft_2']) - $stake;
                    $derrotas++;
                } else {

                    if($partida['homeGoalCount'] === $partida['awayGoalCount']){ 
                        $empates++;
                    } else {
                        $vitorias++;
                    }
                    $sum = $sum - $stake;
                } 
                $partidas++;
            
        }
        $record = [
            'temporada' => '2018/2019',
            'pais' => 'England',
            'percentual_partidas' => 100,
            'percentual_vitorias' => round($vitorias/$partidas*100,2),
            'percentual_empates' => round($empates/$partidas*100,2),
            'percentual_derrotas' => round($derrotas/$partidas*100,2),
            'lucro' => round($sum,2),
            'roi' => round($sum/$partidas,2)
        ];
        array_push($arrData,$record); 
        return response()->json($arrData,$response->status());
    }

    public function leagueBackAwayVisitante(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        
        $response = Http::get('https://api.football-data-api.com/league-matches?key=example&league_id='.$season);
        $json_partidas = $response->json();

        $arrData = [];

        $sum = 0;
        $partidas = 0;
        $vitorias = 0;
        $empates = 0;
        $derrotas = 0;
        foreach ($json_partidas['data'] as $partida){
            
               if($partida['homeGoalCount'] < $partida['awayGoalCount']){
                    $sum = $sum + ($stake*$partida['odds_ft_2']) - $stake;
                    $derrotas++;
                } else {

                    if($partida['homeGoalCount'] === $partida['awayGoalCount']){ 
                        $empates++;
                    } else {
                        $vitorias++;
                    }
                    $sum = $sum - $stake;
                } 
                $partidas++;
            
        }
        $record = [
            'temporada' => '2018/2019',
            'pais' => 'England',
            'percentual_partidas' => 100,
            'percentual_vitorias' => round($vitorias/$partidas*100,2),
            'percentual_empates' => round($empates/$partidas*100,2),
            'percentual_derrotas' => round($derrotas/$partidas*100,2),
            'lucro' => round($sum,2),
            'roi' => round($sum/$partidas,2)
        ];
        array_push($arrData,$record); 
        return response()->json($arrData,$response->status());
    }
 
}
