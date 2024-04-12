<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;

use App\http\Controllers\ContratadoController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\ConcelhoController;
use App\Http\Controllers\OrcamentoController;
use App\Http\Controllers\PropostaController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DashboardController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// login controller =========================================================
Route::post('/login',[loginController::class,'login']);
Route::post('/signin',[loginController::class,'loginAdmin']);
Route::middleware('auth:sanctum')->post('/logout',[loginController::class,'logout']);
Route::post('/cadastro',[loginController::class,'cadastro']);
Route::middleware('auth:sanctum')->post('/verifyemail', [loginController::class, 'verifyEmail']);
Route::middleware('auth:sanctum')->post('/sendverificationemail', [loginController::class, 'sendVerificationEmail']);
Route::post('/sendrecoverypasswordmail', [loginController::class, 'sendRecoveryPasswordEmail']);
Route::post('/changepassword', [loginController::class, 'changePassword']);
// User controller =========================================================
Route::middleware('auth:sanctum')->post('/avatar',[UserController::class,'updateAvatar']);
Route::middleware('auth:sanctum','verified')->get('/user',[UserController::class,'getUser']);
Route::middleware('auth:sanctum','verified')->get('/clientes/{id}',[UserController::class,'getCliente']);
Route::middleware('auth:sanctum','verified')->get('/clientes',[UserController::class,'getAllClients']);
Route::middleware('auth:sanctum','verified')->post('/clientes/{id}',[UserController::class,'updateCliente']);
Route::post('/user/update',[UserController::class,'update']);
// workers
Route::middleware('auth:sanctum','verified')->get('/workers', [WorkerController::class, 'index']);
Route::middleware('auth:sanctum','verified')->post('/workers/{id}',[WorkerController::class,'update']);
// Categorias
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::middleware('auth:sanctum')->get('/categorias2', [CategoriaController::class, 'index2']);
Route::middleware('auth:sanctum')->post('/categorias', [CategoriaController::class, 'store']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
Route::middleware('auth:sanctum')->post('/categorias/{id}', [CategoriaController::class, 'update']);
// Distritos
Route::get('/distritos', [DistritoController::class, 'index']);
// Concelhos
Route::get('/concelhos/{id}', [ConcelhoController::class, 'index']);
// Orçamentos
Route::middleware('auth:sanctum')->post('/orcamentos', [OrcamentoController::class, 'store']);
Route::middleware('auth:sanctum','verified')->get('/orcamentos', [OrcamentoController::class, 'index']);
Route::middleware('auth:sanctum','verified')->get('/orcamentos/all', [OrcamentoController::class, 'getAll']);
Route::middleware('auth:sanctum')->get('/orcamentos/{id}', [OrcamentoController::class, 'show']);
Route::middleware('auth:sanctum')->get('/orcamentos/categoria/{id}', [OrcamentoController::class, 'getByCategory']);
// Propostas
Route::middleware('auth:sanctum','verified')->get('/propostas', [PropostaController::class, 'index']);
Route::middleware('auth:sanctum')->post('/propostas', [PropostaController::class, 'store']);
Route::middleware('auth:sanctum')->put('/propostas/{id}', [PropostaController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/propostas/{id}', [PropostaController::class, 'destroy']);
// Payments
Route::middleware('auth:sanctum')->post('/payment/intent', [PaymentController::class, 'paymentIntent']);
// Orders
Route::middleware('auth:sanctum')->post('/orders', [OrderController::class, 'store']);
Route::middleware('auth:sanctum')->get('/orders', [OrderController::class, 'index']);
// Config
Route::middleware('auth:sanctum','verified')->get('/config', [ConfigController::class, 'index']);
Route::middleware('auth:sanctum','verified')->post('/config', [ConfigController::class, 'update']);
//delete account
Route::middleware('auth:sanctum')->post('/deleteaccount',[UserController::class,'destroy']);
// Dashboard
Route::middleware('auth:sanctum','verified')->get('/dashboard', [DashboardController::class, 'index']);
// testes da stake house
/*
Route::post('/backHomeCasa', [DistritoController::class, 'backHomeCasa']);
Route::post('/backHomeVisitante', [DistritoController::class, 'backHomeVisitante']);

Route::post('/backDrawCasa', [DistritoController::class, 'backDrawCasa']);
Route::post('/backDrawVisitante', [DistritoController::class, 'backDrawVisitante']);

Route::post('/backAwayCasa', [DistritoController::class, 'backAwayCasa']);
Route::post('/backAwayVisitante', [DistritoController::class, 'backAwayVisitante']);

Route::post('/backOverCasa', [DistritoController::class, 'backOverCasa']);
Route::post('/backOverVisitante', [DistritoController::class, 'backOverVisitante']);

Route::post('/backUnderCasa', [DistritoController::class, 'backUnderCasa']);
Route::post('/backUnderVisitante', [DistritoController::class, 'backUnderVisitante']);

Route::post('/backBTTSCasa', [DistritoController::class, 'backBTTSCasa']);
Route::post('/backBTTSVisitante', [DistritoController::class, 'backBTTSVisitante']);

Route::post('/backBTTNCasa', [DistritoController::class, 'backBTTNCasa']);
Route::post('/backBTTNVisitante', [DistritoController::class, 'backBTTNVisitante']);

Route::post('/layHomeCasa', [DistritoController::class, 'layHomeCasa']);
Route::post('/layHomeVisitante', [DistritoController::class, 'layHomeVisitante']);

Route::post('/layDrawCasa', [DistritoController::class, 'layDrawCasa']);
Route::post('/layDrawVisitante', [DistritoController::class, 'layDrawVisitante']);

Route::post('/layAwayCasa', [DistritoController::class, 'layAwayCasa']);
Route::post('/layAwayVisitante', [DistritoController::class, 'layAwayVisitante']);

Route::post('/doubleChance1xCasa', [DistritoController::class, 'doubleChance1xCasa']);
Route::post('/doubleChance1xVisitante', [DistritoController::class, 'doubleChance1xVisitante']);

Route::post('/doubleChance12Casa', [DistritoController::class, 'doubleChance12Casa']);
Route::post('/doubleChance12Visitante', [DistritoController::class, 'doubleChance12Visitante']);

Route::post('/doubleChancex2Casa', [DistritoController::class, 'doubleChancex2Casa']);
Route::post('/doubleChancex2Visitante', [DistritoController::class, 'doubleChancex2Visitante']);

// =====================
Route::post('/leagueBackHomeCasa', [DistritoController::class, 'leagueBackHomeCasa']);
Route::post('/leagueBackHomeVisitante', [DistritoController::class, 'leagueBackHomeVisitante']);

Route::post('/leagueBackDrawCasa', [DistritoController::class, 'leagueBackDrawCasa']);
Route::post('/leagueBackDrawVisitante', [DistritoController::class, 'leagueBackDrawVisitante']);

Route::post('/leagueBackAwayCasa', [DistritoController::class, 'leagueBackAwayCasa']);
Route::post('/leagueBackAwayVisitante', [DistritoController::class, 'leagueBackAwayVisitante']);
*/