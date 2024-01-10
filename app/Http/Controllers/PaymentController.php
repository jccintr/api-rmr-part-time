<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;


class PaymentController extends Controller
{
    public function paymentIntent(Request $request)
    {
        $amount = $request->amount * 100;

        try {

            $stripe = new \Stripe\StripeClient(env('STRIPE_SK'));
            $response = $stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => 'eur', //brl', //'usd', // eur
            'automatic_payment_methods' => ['enabled' => true],
            ]);
            return response()->json(['paymentIntent' => $response->client_secret],200);

        } catch (Exception $ex){

            return response()->json(['error'=> 'Erro message'],500);
            
        }

        

    }
}
