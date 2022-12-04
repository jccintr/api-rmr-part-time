<?php

namespace App\Http\Controllers;

use App\Models\Contratado;
use App\Models\User;
use Illuminate\Http\Request;

class ContratadoController extends Controller
{
//================================================================
// Adiciona um Contratado POST
//================================================================

public function subscribe(Request $request)
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

//================================================================
// Recupera os profissionais inscritos em um Servico POST
//================================================================

public function getContratadosByService($idServico){

 $contratados = Contratado::where('servico_id',$idServico)->get();

foreach ($contratados as $contratado){
  $user = User::find($contratado->user_id);
  $contratado->user = $user;

}


 if ($contratados) {
    return response()->json($contratados,200);
  } else {
    return response()->json(['erro'=>'Contratados não encontrados'],404);
  }

}

//================================================================
// Desativa um contratado POST
//================================================================
public function deactive(Request $request){

  $contratado_id = $request->contratado_id;
  $contratado = Contratado::find($contratado_id);

  if ($contratado) {
    $contratado->ativo = false;
    $contratado->save();
    return response()->json($contratado,200);
   } else {
     return response()->json(['erro'=>'Contratado não encontrado'],404);
   }
}

//================================================================
// Ativa um contratado POST
//================================================================
public function active(Request $request){

  $contratado_id = $request->contratado_id;
  $contratado = Contratado::find($contratado_id);

  if ($contratado) {
    $contratado->ativo = true;
    $contratado->save();
    return response()->json($contratado,200);
   } else {
     return response()->json(['erro'=>'Contratado não encontrado'],404);
   }

}

}
