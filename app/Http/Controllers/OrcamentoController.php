<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Proposta;

class OrcamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orcamentos = Orcamento::where('user_id',Auth::User()->id)->with('concelho')->with('distrito')->with('propostas.user')->with('categoria')->get();

        return response()->json($orcamentos,200);
    }

    public function getAll()
    {
        $orcamentos = Orcamento::where('status',0)->with('concelho')->with('distrito')->with('propostas')->with('categoria')->get();

        return response()->json($orcamentos,200);
    }

    public function getByCategory($id){
        
        $orcamentos = Orcamento::where('categoria_id',$id)->where('status',0)->with('concelho')->with('distrito')->withCount('propostas')->with('categoria')->get();

        return response()->json($orcamentos,200);
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
        $titulo = $request->titulo;
        $descricao = $request->descricao;
        $logradouro = $request->logradouro;
        $numero = $request->numero;
        $distrito_id = $request->distrito_id;
        $concelho_id = $request->concelho_id;
        $imagem = $request->imagem;
        $data_execucao = $request->data_execucao;
        
        $newOrcamento = new Orcamento();
        $newOrcamento->user_id = $user_id;
        $newOrcamento->categoria_id = $categoria_id;
        $newOrcamento->titulo = $titulo;
        $newOrcamento->descricao = $descricao;
        $newOrcamento->logradouro = $logradouro;
        $newOrcamento->numero = $numero;
        $newOrcamento->distrito_id = $distrito_id;
        $newOrcamento->concelho_id = $concelho_id;
        $newOrcamento->data_execucao = $data_execucao;
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
        $orcamento = Orcamento::with('propostas')->with('distrito')->with('concelho')->with('categoria')->find($id);

        return response()->json($orcamento,200);
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
