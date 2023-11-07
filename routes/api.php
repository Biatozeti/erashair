<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
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
Route::post('servico/store1',
[ServicoController::class, 'store1']);

Route::get('servico/retornarTodes',
[ServicoController::class, 'retornarTodes']);

Route::post('servico/nome',
[ServicoController::class, 'pesquisarPorNome']);

Route::post('servico/descricao1',
[ServicoController::class, 'PesquisarPorDescricao1']);

Route::delete('deleteServico/{id}',
[ServicoController::class, 'deleteservico']);

Route::put('servico/update',
[ServicoController::class, 'update']);

//

Route::post('cliente/store2',
[ClienteController::class, 'store2']);

Route::get('cliente/retornarTodes',
[ClienteController::class, 'retornarTodes']);

Route::post('cliente/nome2',
[ClienteController::class, 'pesquisarPorNome2']);

Route::post('cliente/cpf',
[ClienteController::class, 'PesquisarPorCpf']);

Route::post('cliente/celular',
[ClienteController::class, 'PesquisarPorCelular']);

Route::post('cliente/email',
[ClienteController::class, 'PesquisarPorEmail']);

Route::delete('cliente/delete/{id}',
[ClienteController::class, 'delete']);

Route::put('cliente/update',
[ClienteController::class, 'update']);

route::post('cliente/esqueciSenha',
[ClienteController::class,'esqueciSenha']);

//


Route::post('Profissional/cadastro',[ProfissionalController::class,'store']);
Route::get('Profissional/retornarTodos',[ProfissionalController::class,'retornarTodos']);
Route::post('Profissional/procurarNome',[ProfissionalController::class, 'pesquisarPorNome']);
Route::post('Profissional/procurarCpf',[ProfissionalController::class, 'pesquisarPorCpf']);
Route::post('Profissional/procurarCEP',[ProfissionalController::class, 'pesquisarPorCelular']);
Route::post('Profissional/procurarEmail',[ProfissionalController::class, 'pesquisarPorEmail']);
Route::delete('Profissional/excluir/{id}',[ProfissionalController::class, 'excluir']);
Route::put('Profissional/atualizar', [ProfissionalController::class, 'update']);