<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Orcamento;

class OrcamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::User()->id;
        $categoria_id = $request->categoria_id;
        $descricao = $request->descricao;
        $logradouro = $request->logradouro;
        $numero = $request->numero;
        $distrito_id = $request->distrito_id;
        $concelho_id = $request->concelho_id;
        $imagem = $request->imagem;
        
        /*
        if (!$categoria_id or !$nome or !$descricao or !$preco){
            $array['erro'] = "Campos obrigatórios não informados.";
            return response()->json($array,400);
        }
        */

        $newOrcamento = new Orcamento();
        $newOrcamento->user_id = $user_id;
        $newOrcamento->categoria_id = $categoria_id;
        $newOrcamento->descricao = $descricao;
        $newOrcamento->logradouro = $logradouro;
        $newOrcamento->numero = $numero;
        $newOrcamento->distrito_id = $distrito_id;
        $newOrcamento->concelho_id = $concelho_id;
        if($imagem){
            $imagem_url = $imagem->store('imagens/orcamentos','public');
            $newOrcamento->imagem = $imagem_url;
        }
        $newOrcamento->save();

        return response()->json($newOrcamento,201);
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
}
