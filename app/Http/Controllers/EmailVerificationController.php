<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

class EmailVerificationController extends Controller
{


    // public function sendVerificationEmail(Request $request) {

    //     if($request->user()->hasVerifiedEmail()){
    //         return ['message'=> 'Este email já foi verificado'];
    //     }

    //     $request->user()->sendEmailVerificationNotification();
        
    //     return ['status'=> 'Link de verificação enviado'];
    // }

    public function sendVerificationEmail(Request $request) {


        if (Auth::User()->hasVerifiedEmail()){
            return response()->json(['mensagem'=>'Email já verificado'],401);
        }
        $code = rand(100000,999999);
        
        Mail::to(Auth::User())->send(new EmailVerification($code));
        return response()->json(['mensagem'=>'Código de verificação enviado'],200);
    }

    

    public function verifyEmail(EmailVerificationRequest $request) {

        if($request->user()->hasVerifiedEmail()){
            return ['message'=> 'Este email já foi verificado'];
        }

        if($request->user()->markEmailAsVerified()){
            event(new Verified($request->user()));
            return ['message'=> 'O email foi verificado'];
        }

    }
}
