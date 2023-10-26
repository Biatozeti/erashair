<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('store1',
[ServicoController::class, 'store1']);

Route::get('servico/retornarTodes',
[ServicoController::class, 'retornarTodes']);

Route::post('nome1',
[ServicoController::class, 'pesquisarPorNome1']);

Route::post('descricao1',
[ServicoController::class, 'PesquisarPorDescricao1']);

Route::delete('deleteServico/{id}',
[ServicoController::class, 'deleteservico']);

Route::put('update',
[ServicoController::class, 'update']);

//

Route::post('store2',
[ClienteController::class, 'store2']);

Route::post('nome2',
[ClienteController::class, 'pesquisarPorNome2']);

Route::post('cpf',
[ClienteController::class, 'PesquisarPorCpf']);

Route::post('celular',
[ClienteController::class, 'PesquisarPorCelular']);

Route::post('email',
[ClienteController::class, 'PesquisarPorEmail']);

Route::delete('delete/{id}',
[ClienteController::class, 'delete']);

Route::put('update',
[ClienteController::class, 'update']);

route::post('esqueciSenha',
[ClienteController::class,'esqueciSenha']);

//

Route::post('store3',
[ProfissionalController::class,'store']);

Route::post('pesquisaPorNome3',
[ProfissionalController::class, 'pesquisaPorNome3']);