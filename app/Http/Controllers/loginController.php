<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class loginController extends Controller
{
    //
    public function login(Request $request){

        $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
        $password = $request->password;
 
        $credentials = ['email'=> $email,'password'=>$password];

        //verifica se o email existe
        if (!Auth::attempt($credentials)) {
            return response()->json(['erro'=>'Email e ou senha inválidos'],401);
        }

        $token = Auth::User()->createToken('rmr');
        $loggedUser = Auth::User();
        $loggedUser['token'] = $token->plainTextToken;
        return response()->json($loggedUser,200); 
    }

    public function cadastro(Request $request ){

        

        $name = $request->name;
        $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
        $password = $request->password;
        $telefone = $request->telefone;
        $role = $request->role;
        $concelho_id = $request->concelho_id;
        if(!$name or !$email or !$password or !$telefone or !$concelho_id) {
            $array['erro'] = "Campos obrigatórios não informados.";
            return response()->json($array,400);
        }
               
        $user = User::select()->where('email', $email)->first();
        if($user) {
            $array['erro'] = "Email já cadastrado.";
            return response()->json($array,400);
        }
        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = Hash::make($password);
        $newUser->telefone = $telefone;
        $newUser->role = $role;
        $newUser->concelho_id = $concelho_id;
        $newUser->save();
        //realiza login com o novo usuario
        $credentials = ['email'=> $newUser->email,'password'=>$password];
        if (!Auth::attempt($credentials)) {
            return response()->json(['erro'=>'Email e ou senha inválidos'],401);
        }
        $loggedUser = Auth::User();
        $token = Auth::User()->createToken('rmr');
        $loggedUser['token'] = $token->plainTextToken;
        return response()->json($loggedUser,201);

            
           }

   


}
