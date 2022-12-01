<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class loginController extends Controller
{
    //
    public function signin(Request $request){

        $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
       
        $password = $request->password;
 
 
        if(!$email or !$password) {
            $array['erro'] = "Nome de usuário e ou senha inválidos";
            return response()->json($array,400);
        }
 
        $user = User::select()->where('email', $email)->first();
        if(!$user) {
            $array['erro'] = "Nome de usuário e ou senha inválidos";
            return response()->json($array,400);
        }
        
        if(!password_verify($password, $user->password)) {
            $array['erro'] = "Nome de usuário e ou senha inválidos";
            return response()->json($array,400);
        }
 
        $token = md5(time().rand(0,9999).time());
        $user->token = $token;
        $user->save();
        
        return response()->json($user,201);
       

    }

    public function signup(Request $request ){

        $name = $request->name;
        $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
        $password = $request->password;
        $telefone = $request->telefone;
        $role = $request->role;
       
        if($name && $email && $password && $telefone) {
            $user = User::select()->where('email', $email)->first();
            if($user) {
                $array['erro'] = "Email já cadastrado.";
                return response()->json($array,400);
            }
           
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $token = md5(time().rand(0,9999).time());

            $newUser = new User();
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = $password_hash;
            $newUser->telefone = $telefone;
            $newUser->role = $role;
            $newUser->token = $token;
            $newUser->save();
            if($newUser){
                return response()->json($newUser,201);
                            
            }
           
            

        }

    }


}
