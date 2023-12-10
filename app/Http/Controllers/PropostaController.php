<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Proposta;
use App\Models\Orcamento;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PropostaRecebida;

class PropostaController extends Controller
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
        $orcamento_id = $request->orcamento_id;
        $resposta = $request->resposta;
        $valor = $request->valor;

        $newProposta = new Proposta();
        $newProposta->user_id = $user_id;
        $newProposta->orcamento_id = $orcamento_id;
        $newProposta->resposta = $resposta;
        $newProposta->valor = $valor;
        $newProposta->save();
        //envia o email para o criador do orcamento avisando que recebeu uma nova proposta
        $orcamento = Orcamento::find($orcamento_id);
        $user_orcamento = User::find($orcamento->user_id);
        Mail::to($user_orcamento->email)->send(new PropostaRecebida($user_orcamento->name,$orcamento->titulo));
        return response()->json($newProposta,201);
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
