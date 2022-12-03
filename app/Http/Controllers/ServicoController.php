<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{

//================================================================
// Adiciona um Serviço POST
//================================================================

public function add(Request $request)
{
  $array = ['erro'=>''];

  $nome = $request->nome;
  $descricao = $request->descricao;
  $valor_cliente = $request->valor_cliente;
  $valor_profissional = $request->valor_profissional;
  $unidade = $request->unidade;
  $horario = $request->horario;
  $periodo_minimo = $request->periodo_minimo;
  $imagem = $request->file('imagem');

  if($imagem && $nome && $descricao) {
    $imagem_url = $imagem->store('imagens/servicos','public');
    $retorno = Servico::create([
        'nome' => $nome,
        'descricao' => $descricao,
        'valor_cliente'=> $valor_cliente,
        'valor_profissional' => $valor_profissional,
        'unidade' => $unidade,
        'horario' => $horario,
        'periodo_minimo' => $periodo_minimo,
        'imagem' => $imagem_url
    ]);
      return response()->json($retorno,201);
  } else {
    $array['erro'] = "Requisição mal formatada";
    return response()->json($array,400);
  }
}

//===========================================================
// Lista todos Servicos GET
//===========================================================
public function list() {

  $servicos = Servico::orderBy('nome')->get();
  if ($servicos) {
    return response()->json($servicos,200);
  } else {
    return response()->json(['erro'=>'Serviços não encontradas'],404);
  }

}




}
