<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;
use App\http\Controllers\ContratadoController;
use App\Http\Controllers\loginController;

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


// Servico Controller ====================================================
Route::get('/servicos', [ServicoController::class, 'list']);
Route::post('/servicos', [ServicoController::class, 'add']);
Route::get('/servico/{id}', [ServicoController::class, 'getById']);
// Contratado Controller ====================================================
Route::get('/contratados', [ContratadoController::class, 'list']);
Route::post('/contratados', [ContratadoController::class, 'add']);
Route::get('/contratado/{id}', [ContratadoController::class, 'getById']);
// login controller =========================================================
Route::post('/signin',[loginController::class,'signin']);
Route::post('/signup',[loginController::class,'signup']);

