<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\servico;
use Illuminate\Http\Request;

class ServicoController extends Controller

    {
        public function store1(ServicoFormRequest $request)
        {
          $usuario = servico::create([
      
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,
          ]);
          return response()->json([
            "success" => true,
            "message" => "usuario Cadastrado com sucesso",
            "data" => $usuario
          ], 200);
        }

        public function pesquisarPorNome1(Request $request)
        {
          $usuario = servico::where('nome', 'like', '%' . $request->pesquisarPorNome1 . '%')->get();
      
          if (count($usuario) > 0) {
            return response()->json([
              'status' => true,
              'data' => $usuario
            ]);
          }
      
          return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisa'
          ]);
        }

        public function pesquisarPorDescricao1(Request $request)
        {
          $usuario = servico::where('descricao', 'like', '%' . $request->pesquisarPorDescricao1. '%')->get();
      
          if (count($usuario) > 0) {
            return response()->json([
              'status' => true,
              'data' => $usuario
            ]);
          }
      
          return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisa'
          ]);
        }
        public function update(request $request)
        {
          $usuario = servico::find($request->id);
      
          if (!isset($usuario)) {
            return response()->json([
              'status' => false,
              'message' => "cadastro nao encontrado "
            ]);
          }
          if (isset($request->nome)) {
            $usuario->nome = $request->nome;
          }
      
          if (isset($request->descricao)) {
            $usuario->descricao = $request->descricao;
          }
          if (isset($request->duracao)) {
            $usuario->duracao= $request->duracao;
          }
          if (isset($request->preco)) {
            $usuario->preco= $request->preco;
          }


      
          $usuario-> update();
      
          return response()->json([
            'status' => true,
            'message' => 'cadastro atualizado'
          ]);
        }
        public function excluir($id)
  {
    $usuario= servico::find($id);

    if (!isset($usuario)) {
      return response()->json([
        'status' => false,
        'message' => "cadastro nao encontrado "
      ]);
    }

    $usuario->delete();
    return response()->json([
      'status' => true,
      'message' => "cadastro excluido com sucesso"
    ]);
  }


}
