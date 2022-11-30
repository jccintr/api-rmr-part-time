<?php

namespace App\Http\Controllers;

use App\Models\Contratado;
use Illuminate\Http\Request;

class ContratadoController extends Controller
{
  //================================================================
// Adiciona um Contratado POST
//================================================================

public function add(Request $request)
{
  $array = ['erro'=>''];

  $servico_id = $request->servico_id;
  $user_id = $request->user_id;
  $ativo = $request->ativo;
 
  


  if($servico_id && $user_id ) {
  
    $retorno = Contratado::create([
        'servico_id' => $servico_id,
        'user_id' => $user_id,
        'ativo'=> $ativo
        
    ]);

      return response()->json($retorno,201);
  } else {
    $array['erro'] = "Requisição mal formatada";
    return response()->json($array,400);
  }
}
}
