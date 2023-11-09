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
use App\Http\Controllers\EmailVerificationController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//User Controller ========================================================

// login controller =========================================================
Route::post('/login',[loginController::class,'login']);
Route::post('/cadastro',[loginController::class,'cadastro']);
Route::middleware('auth:sanctum')->post('/verifyemail', [loginController::class, 'verifyEmail']);
Route::middleware('auth:sanctum')->post('/sendverificationemail', [loginController::class, 'sendVerificationEmail']);
// User controller =========================================================
Route::middleware('auth:sanctum')->post('/avatar',[UserController::class,'updateAvatar']);
Route::get('/user/{token}',[UserController::class,'getUser']);
Route::post('/user/update',[UserController::class,'update']);
// Categorias
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
// Distritos
Route::get('/distritos', [DistritoController::class, 'index']);
// Concelhos
Route::get('/concelhos/{id}', [ConcelhoController::class, 'index']);
// Orçamentos
Route::middleware('auth:sanctum')->post('/orcamentos', [OrcamentoController::class, 'store']);
Route::middleware('auth:sanctum','verified')->get('/orcamentos', [OrcamentoController::class, 'index']);
Route::middleware('auth:sanctum')->get('/orcamentos/{id}', [OrcamentoController::class, 'show']);
// Email Verification
//Route::middleware('auth:sanctum')->post('/send-email-notification', [EmailVerificationController::class, 'sendVerificationEmail']);
//Route::middleware('auth:sanctum')->get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verifyEmail'])->name('verification.verify');