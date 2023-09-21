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

// Servico Controller ====================================================
Route::get('/servicos', [ServicoController::class, 'list']);
Route::post('/servicos', [ServicoController::class, 'add']);
Route::get('/servico/{id}', [ServicoController::class, 'getById']);
// Contratado Controller ====================================================
// Route::post('/contratados', 'App\Http\Controllers\ContratadoController@subscribe');  // adiciona um contratado
// Route::post('/contratados/deactive', 'App\Http\Controllers\ContratadoController@deactive'); // desativa um contratado
// Route::post('/contratados/active', 'App\Http\Controllers\ContratadoController@active'); // reactiva um contratado
// Route::get('/contratados/{idServico}', 'App\Http\Controllers\ContratadoController@getContratadosByService'); // lista contratados por serviço
// login controller =========================================================
Route::post('/login',[loginController::class,'login']);
Route::post('/cadastro',[loginController::class,'cadastro']);
// User controller =========================================================
Route::post('/avatar',[UserController::class,'updateAvatar']);
Route::get('/user/{token}',[UserController::class,'getUser']);
Route::post('/user/update',[UserController::class,'update']);
// Contrato Controller ===================================================
// Route::post('/contratos',[ContratoController::class,'add']);
// Route::get('/contratos/cliente/{id}',[ContratoController::class,'getByCliente']);
// Route::get('/contratos/profissional/{id}',[ContratoController::class,'getByProfissional']);
// Categorias
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
// Distritos
Route::get('/distritos', [DistritoController::class, 'index']);
// Concelhos
Route::get('/concelhos/{id}', [ConcelhoController::class, 'index']);
// Orçamentos
Route::middleware('auth:sanctum')->post('/orcamentos', [OrcamentoController::class, 'store']);