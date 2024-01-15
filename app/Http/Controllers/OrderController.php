<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Config;
use App\Models\Proposta;
use App\Models\Orcamento;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PropostaAceita;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $config = Config::find(1);
        $newOrder = New Order();
        $newOrder->orcamento_id = $request->orcamento_id;
        $newOrder->proposta_id = $request->proposta_id;
        
        $proposta = Proposta::find($request->proposta_id);
        $proposta->aceita = true;
        $proposta->save();
        
        $orcamento = Orcamento::find($request->orcamento_id);
        $orcamento->proposta_id = $proposta->id;
        $orcamento->status = 1;
        $orcamento->save();

        $cliente = User::find($orcamento->user_id);
        $profissional = User::find($proposta->user_id);
        
        $newOrder->valor_proposta = $proposta->valor;
        $newOrder->valor_iva = $proposta->valor * ( $config->percentual_iva / 100 );
        $newOrder->valor_taxa_uso = $proposta->valor * ( $config->percentual_cliente / 100 );
        $newOrder->valor_total_cliente = $proposta->valor + $newOrder->valor_iva + $newOrder->valor_taxa_uso;
        $newOrder->valor_taxa_profissional = $proposta->valor * ( $config->percentual_profissional / 100 );
        $newOrder->valor_profissional = $proposta->valor - $newOrder->valor_taxa_profissional;
        $newOrder->payment_intent = $request->payment_intent;
        $newOrder->save();
        // avisa o profissional que a proposta foi aceita // $cliente_name,$profissional_name,$orcamento_titulo
        Mail::to($profissional->email)->send(new PropostaAceita($cliente->name,$profissional->name,$orcamento->titulo));
        return response()->json($newOrder,201);
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
