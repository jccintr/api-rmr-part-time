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

    public function backUnderCasa(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        $under = $request->under;
        
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

                    if($partida['totalGoalCount'] <= floor($under)){
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

    public function backUnderVisitante(Request $request){
      
        $stake = $request->stake * 1;
        $season = $request->season * 1;
        $under = $request->under;
        
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

                    if($partida['totalGoalCount'] <= floor($under)){
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

 
   

 
}
