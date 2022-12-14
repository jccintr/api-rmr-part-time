<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

public function updateAvatar(Request $request) {

    $userId = $request->userId;
    $imagem = $request->file('imagem');
    //dd($imagem);

    if ($userId and $imagem){

        $usuario = User::find($userId);
        if($usuario->imagem){
            Storage::disk('public')->delete($usuario->imagem);
        }

        $imagem_url = $imagem->store('imagens/avatar','public');
        $usuario->imagem = $imagem_url;
        $usuario->save();
        return response()->json($usuario,200);

    } else {

        $array['erro'] = "Campos obrigatórios não informados.";
        return response()->json($array,400);
    }

}
public function getUser($token) {

  $user = User::where('token',$token)->first();

  if($user){
      return response()->json($user,200);
  } else {
    return response()->json(['erro'=>'Usuário não encontrado'],404);
  }

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


}
