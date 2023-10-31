<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\servico;
use Illuminate\Http\Request;

class ServicoController extends Controller

    {
        public function store1(ServicoFormRequest $request)
        {
          $servico = servico::create([
      
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco,
          ]);
          return response()->json([
            "success" => true,
            "message" => "servico Cadastrado com sucesso",
            "data" => $servico
          ], 200);
        }

        public function retornarTodes()
        {
          $servico = servico::all();
      
          return response()->json([
            'status' => true,
            'data' => $servico
          ]);
        }

        public function pesquisarPorNome(Request $request)
        {
          $servico = servico::where('nome', 'like', '%' . $request->nome . '%')->get();
      
          if (count($servico) > 0) {
            return response()->json([
              'status' => true,
              'data' => $servico
            ]);
          }
      
          return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisa'
          ]);
        }

        public function pesquisarPorDescricao1(Request $request)
        {
          $servico = servico::where('descricao', 'like', '%' . $request->pesquisarPorDescricao1. '%')->get();
      
          if (count($servico) > 0) {
            return response()->json([
              'status' => true,
              'data' => $servico
            ]);
          }
      
          return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisa'
          ]);
        }
        public function update(request $request)
        {
          $servico = servico::find($request->id);
      
          if (!isset($servico)) {
            return response()->json([
              'status' => false,
              'message' => "cadastro nao encontrado "
            ]);
          }
          if (isset($request->nome)) {
            $servico->nome = $request->nome;
          }
      
          if (isset($request->descricao)) {
            $servico->descricao = $request->descricao;
          }
          if (isset($request->duracao)) {
            $servico->duracao= $request->duracao;
          }
          if (isset($request->preco)) {
            $servico->preco= $request->preco;
          }


      
          $servico-> update();
      
          return response()->json([
            'status' => true,
            'message' => 'cadastro atualizado'
          ]);
        }
        public function deleteServico($id)
  {
    $servico= servico::find($id);

    if (!isset($servico)) {
      return response()->json([
        'status' => false,
        'message' => "cadastro nao encontrado "
      ]);
    }

    $servico->delete();
    return response()->json([
      'status' => true,
      'message' => "cadastro excluido com sucesso"
    ]);
  }


}
