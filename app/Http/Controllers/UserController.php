<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Orcamento;
use App\Models\Proposta;
use App\Models\Order;
use App\Models\Worker;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

public function updateAvatar(Request $request) {

    
    $imagem = $request->file('imagem');
    if (!$imagem) {
        $array['erro'] = "Campos obrigatórios não informados.";
        return response()->json($array,400);
    }

    $usuario = User::find(Auth::User()->id);
    if($usuario->imagem){
        Storage::disk('public')->delete($usuario->imagem);
    }

    $imagem_url = $imagem->store('imagens/avatar','public');
    $usuario->avatar = $imagem_url;
    $usuario->save();
    return response()->json($usuario,200);

    

}

public function getUser(Request $request) {

  
    return response()->json(Auth::User(),200);
  

}

public function update(Request $request){

  $usuario_id = $request->usuario_id;
  $documento = $request->documento;
  $endereco = $request->endereco;
  $bairro = $request->bairro;
  $cidade = $request->cidade;
  $usuario = User::find($usuario_id);
  if ($usuario) {
      $usuario->documento = $documento;
      $usuario->endereco = $endereco;
      $usuario->bairro = $bairro;
      $usuario->cidade = $cidade;
      $usuario->save();
      return response()->json($usuario,200);
  } else {
      return response()->json(['erro'=>'Usuário não encontrado'],404);
  }

}

public function destroy(Request $request){  //

    //$email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
    //$password = $request->password;

    //$credentials = ['email'=> $email,'password'=>$password];


    //if (!Auth::attempt($credentials)) {
    //    return response()->json(['erro'=>'Email e ou senha inválidos'],404);
    //}
    $user = Auth::User();
    if($user->role==1){ // 1 cliente
        $user_orcamentos = Orcamento::where('user_id',$user->id)->get();
        foreach($user_orcamentos as $user_orcamento){
            if($user_orcamento->status == 1){ // tem Order
                 Order::where('orcamento_id',$user_orcamento->id)->delete();
            }
           Proposta::where('orcamento_id',$user_orcamento->id)->delete();
        }
        Orcamento::where('user_id',$user->id)->delete();
        Auth::User()->tokens()->delete();
        User::where('id',$user->id)->delete();
        return response()->json(['mensagem'=>'Conta de usuário removida com sucesso'],200);
    }
    if($user->role==2){ // 2 profissional
        $user_propostas = Proposta::where('user_id',$user->id)->get();
        foreach($user_propostas as $user_proposta){
            if($user_proposta->aceita == true){ // proposta aceita. remover do Orcamento e Order
                $orcamento = Orcamento::find($user_proposta->orcamento_id);
                $orcamento->proposta_id = null;
                $orcamento->save();
                $order = Order::where('proposta_id',$user_proposta->id)->first();
                $order->proposta_id = null;
                $order->save();
            }
        }
        Proposta::where('user_id',$user->id)->delete();
        Worker::where('id',$user->id)->delete();
        Auth::User()->tokens()->delete();
        User::where('id',$user->id)->delete();
        return response()->json(['mensagem'=>'Conta de usuário removida com sucesso'],200);
    }



}

public function destroy2(Request $request){

    $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
    $password = $request->password;

    $credentials = ['email'=> $email,'password'=>$password];


    if (!Auth::attempt($credentials)) {
        return view('deleteaccount',['error'=>'Email e ou senha inválidos']);
    }
    $user = Auth::User();
    if($user->role==1){ // 1 cliente
        $user_orcamentos = Orcamento::where('user_id',$user->id)->get();
        foreach($user_orcamentos as $user_orcamento){
            if($user_orcamento->status == 1){ // tem Order
                 Order::where('orcamento_id',$user_orcamento->id)->delete();
            }
           Proposta::where('orcamento_id',$user_orcamento->id)->delete();
        }
        Orcamento::where('user_id',$user->id)->delete();
        Auth::User()->tokens()->delete();
        User::where('id',$user->id)->delete();
        return view('deletedaccount');
    }
    if($user->role==2){ // 2 profissional
        $user_propostas = Proposta::where('user_id',$user->id)->get();
        foreach($user_propostas as $user_proposta){
            if($user_proposta->aceita == true){ // proposta aceita. remover do Orcamento e Order
                $orcamento = Orcamento::find($user_proposta->orcamento_id);
                $orcamento->proposta_id = null;
                $orcamento->save();
                $order = Order::where('proposta_id',$user_proposta->id)->first();
                $order->proposta_id = null;
                $order->save();
            }
        }
       Proposta::where('user_id',$user->id)->delete();
       Worker::where('id',$user->id)->delete();
       Auth::User()->tokens()->delete();
       User::where('id',$user->id)->delete();
        return view('deletedaccount');
    }


}



}
