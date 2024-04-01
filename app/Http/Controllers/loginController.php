<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
use App\Mail\EmailPassword;
use App\Mail\WelcomeEmail;



class loginController extends Controller
{
    public function logout (Request $request) {

        Auth::User()->currentAccessToken()->delete();
        return response()->json(['mensagem'=>'User logged out'],200);
    }

    public function loginAdmin(Request $request){

        $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
        $password = $request->password;
 
        $credentials = ['email'=> $email,'password'=>$password];

        //verifica se o email existe
        if (!Auth::attempt($credentials)) {
            return response()->json(['erro'=>'Email e ou senha inválidos'],404);
        }

        if(!Auth::User()->isAdmin){
            return response()->json(['erro'=>'Email e ou senha inválidos'],404);
        }

        $token = Auth::User()->createToken('rmr');
        $loggedUser = Auth::User();
        $loggedUser['token'] = $token->plainTextToken;
        if (!Auth::User()->hasVerifiedEmail()){
           return response()->json($loggedUser,401); 
        } else {
            return response()->json($loggedUser,200); 
        }

    }
    
    public function login(Request $request){

        $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
        $password = $request->password;
 
        $credentials = ['email'=> $email,'password'=>$password];

        //verifica se o email existe
        if (!Auth::attempt($credentials)) {
            return response()->json(['erro'=>'Email e ou senha inválidos'],404);
        }

        $token = Auth::User()->createToken('rmr');
        $loggedUser = Auth::User();
        $loggedUser['token'] = $token->plainTextToken;
        if (!Auth::User()->hasVerifiedEmail()){
           return response()->json($loggedUser,401); 
        } else {
            return response()->json($loggedUser,200); 
        }

    }

    public function cadastro(Request $request ){

        $name = $request->name;
        $email = filter_var($request->email,FILTER_VALIDATE_EMAIL);
        $password = $request->password;
        $telefone = $request->telefone;
        $role = $request->role;
        $concelho_id = $request->concelho_id;
        $categoria_id = $request->categoria_id;

        if($role===1 and (!$name or !$email or !$password or !$telefone or !$concelho_id) ) {
            $array['erro'] = "Campos obrigatórios não informados.";
            return response()->json($array,400);
        }
        
        if($role===2 and (!$name or !$email or !$password or !$telefone or !$concelho_id or !$categoria_id) ) {
            $array['erro'] = "Campos obrigatórios não informados para o profissional.";
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
        // codigo de verificação do email
        $newUser->verification_code = rand(100000,999999);
        $newUser->code_expire_at = date("Y-m-d H:i:s",time() + 1800);

        $newUser->save();
        // se role = 2 cadastrar worker
        if ($role==2){
            $newWorker = new Worker();
            $newWorker->user_id = $newUser->id;
            $newWorker->categoria_id = $categoria_id;
            $newWorker->save();
        }

        
        //event(new Registered($newUser));
        //$newUser->markEmailAsVerified();

        //realiza login com o novo usuario
        $credentials = ['email'=> $newUser->email,'password'=>$password];
        if (!Auth::attempt($credentials)) {
            return response()->json(['erro'=>'Email e ou senha inválidos'],401);
        }
        $loggedUser = Auth::User();
        $token = Auth::User()->createToken('rmr');
        $loggedUser['token'] = $token->plainTextToken;
        // envia o email de confirmação de email
        Mail::to(Auth::User())->send(new EmailVerification($newUser->verification_code));
        return response()->json($loggedUser,201);
     }


   public function sendRecoveryPasswordEmail(Request $request){

        $email = $request->email;
        $user = User::where('email',$email)->first();
        if($user) {
            $user->password_verification_code = rand(100000,999999);
            $user->password_code_expire_at = date("Y-m-d H:i:s",time() + 300);
            $user->save();
            Mail::to($user->email)->send(new EmailPassword($user->password_verification_code));
            return response()->json(['mensagem'=>'Email de recuperação de senha enviado'],200);
        } else {
            return response()->json(['mensagem'=>'User not found'],200);
        }

   }

   public function changePassword(Request $request) {
       
        $codigo = $request->codigo;
        $email = $request->email;
        $newPassword = $request->password;

        $user = User::where('email',$email)->first();
        
        if (!$user){
            return response()->json(['mensagem'=>'Falha ao alterar senha.'],401);
        }
        $now = date("Y-m-d H:i:s"); 
        if ($now > $user->password_code_expire_at) {
            return response()->json(['mensagem'=>'Código expirado'],401);
        }
        if ($codigo !== $user->password_verification_code){
            return response()->json(['mensagem'=>'Código de verificação inválido'],401);
        }

        $user->password = Hash::make($newPassword);
        $user->password_code_expire_at = $now;
        $user->save();
        return response()->json(['mensagem'=>'Senha alterada com sucesso'],200);

  
   }

   public function sendVerificationEmail(Request $request) {

        if (Auth::User()->hasVerifiedEmail()){
            return response()->json(['mensagem'=>'Email já verificado'],401);
        }

        $user = User::find(Auth::User()->id);
        $user->verification_code = rand(100000,999999);
        $user->code_expire_at = date("Y-m-d H:i:s",time() + 1800);
        $user->save();
        Mail::to(Auth::User())->send(new EmailVerification($user->verification_code));
        return response()->json(['mensagem'=>'Código de verificação enviado'],200);

    }
   

    public function verifyEmail(Request $request) {

        $codigo = $request->codigo;

        if (Auth::User()->hasVerifiedEmail()){
            return response()->json(['mensagem'=>'Email já verificado'],401);
        }

        $now = date("Y-m-d H:i:s"); 
        if ($now > Auth::User()->code_expire_at) {
            return response()->json(['mensagem'=>'Código expirado'],401);
        }

        if ($codigo !== Auth::User()->verification_code){
            return response()->json(['mensagem'=>'Código de verificação inválido'],401);
        }
      
            Auth::User()->markEmailAsVerified();
            Mail::to(Auth::User())->send(new WelcomeEmail(Auth::User()));
            return response()->json(['mensagem'=>'Email verificado com sucesso'],200);
      

    }


}
