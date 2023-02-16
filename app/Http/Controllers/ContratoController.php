<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\User;
use App\Models\Servico;

class ContratoController extends Controller
{
//================================================================
// Adiciona um Contrato POST
//================================================================

  public function add(Request $request)
  {
    $servico_id = $request->servico_id;
    $cliente_id = $request->cliente_id;
    $profissional_id = $request->profissional_id;
    $data = $request->data;
    $data_servico = $request->data_servico;
    $descricao = $request->descricao;
    $local = $request->local;
    $quant = $request->quant;
    $valor_unitario_cliente = $request->valor_unitario_cliente;
    $valor_unitario_profissional = $request->valor_unitario_profissional;
    $total_cliente = $request->total_cliente;
    $total_profissional = $request->total_profissional;

    $retorno = Contrato::create([
          'servico_id' => $servico_id,
          'cliente_id' => $cliente_id,
          'profissional_id' => $profissional_id,
          'data' => $data,
          'data_servico' => $data_servico,
          'descricao' => $descricao,
          'local' => $local,
          'quant' => $quant,
          'valor_unitario_cliente' => $valor_unitario_cliente,
          'valor_unitario_profissional' => $valor_unitario_profissional,
          'total_cliente' => $total_cliente,
          'total_profissional' => $total_profissional,
          'status' => 1
      ]);
      return response()->json($retorno,201);
  }

//================================================================
// Recupera um Contrato por Id GET
//================================================================
public function getById($id){

}

//================================================================
// Recupera os Contratos de um Cliente
//================================================================
public function getByCliente($id){

 $contratos = Contrato::where('cliente_id',$id)->get();

 if ($contratos){
   foreach($contratos as $contrato) {
     $servico = Servico::find($contrato->servico_id);
     $contrato->servico = $servico;
     $profissional = User::find($contrato->profissional_id);
     unset($profissional->token);
     $contrato->profissional = $profissional;
   }
   return response()->json($contratos,200);
 } else {
   return response()->json(['erro'=>'Contratos não encontradas'],404);
 }

}

//================================================================
// Recupera os Contratos de um Profussional
//================================================================
public function getByProfissional($id){

  $contratos = Contrato::Where('profissional_id',$id)->get();

  if ($contratos){
    foreach($contratos as $contrato) {
      $contrato->valor_unitario_cliente = $contrato->valor_unitario_cliente / 100;
      $contrato->valor_unitario_profissional = $contrato->valor_unitario_profissional / 100;
      $contrato->total_cliente = $contrato->total_cliente / 100;
      $contrato->total_profissional = $contrato->total_profissional / 100;
      $servico = Servico::find($contrato->servico_id);
      $contrato->servico = $servico;
      $cliente = User::find($contrato->cliente_id);
      unset($cliente->token);
      $contrato->cliente = $cliente;
    }
    return response()->json($contratos,200);
  } else {
    return response()->json(['erro'=>'Contratos não encontradas'],404);
  }

}

}
