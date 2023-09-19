<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\cliente;
use App\Models\servico;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function store(ClienteFormRequest $request)
    {
      $cliente = cliente::create([
  
        'nome' => $request->nome,
        'celular' => $request->celular,
        'cpf' => $request->cpf,
        'email' => $request->email,
        'dataNascimento' => $request->dataNascimento,
        'cidade' => $request->cidade,
        'estado' => $request->estado,
        'pais' => $request->pais,
        'rua' => $request->rua,
        'numero' => $request->numero,
        'bairro' => $request->bairro,
        'cep' => $request->cep,
        'complemento' => $request->complemento,
        'senha' => $request->senha,

      ]);
      return response()->json([
        "success" => true,
        "message" => "cliente Cadastrado com sucesso",
        "data" => $cliente
      ], 200);
    }

    public function pesquisarPorNome(Request $request)
        {
          $cliente = cliente::where('nome', 'like', '%' . $request->nome . '%')->get();
      
          if (count($cliente) > 0) {
            return response()->json([
              'status' => true,
              'data' => $cliente
            ]);
          }
      
          return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisa'
          ]);
        }

        public function pesquisarPorCpf(Request $request)
        {
          $cliente = cliente::where('cpf', 'like', '%' . $request->cpf. '%')->get();
      
          if (count($cliente) > 0) {
            return response()->json([
              'status' => true,
              'data' => $cliente
            ]);
          }
          return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisa'
          ]);
        }

          public function pesquisarPorCelular(Request $request)
          {
            $cliente = cliente::where('celular', 'like', '%' . $request->celular . '%')->get();
        
            if (count($cliente) > 0) {
              return response()->json([
                'status' => true,
                'data' => $cliente
              ]);
            }
        
            return response()->json([
              'status' => false,
              'message' => 'nao ha resultados para pesquisa'
            ]);
          }  

          public function pesquisarPorEmail(Request $request)
          {
            $cliente = cliente::where('email', 'like', '%' . $request->email . '%')->get();
        
            if (count($cliente) > 0) {
              return response()->json([
                'status' => true,
                'data' => $cliente
              ]);
            }
        
            return response()->json([
              'status' => false,
              'message' => 'nao ha resultados para pesquisa'
            ]);
          }

          public function update(request $request)
          {
            $cliente = cliente::find($request->id);
        
            if (!isset($cliente)) {
              return response()->json([
                'status' => false,
                'message' => "cadastro nao encontrado "
              ]);
            }
            if (isset($request->nome)) {
              $cliente->nome = $request->nome;
            }
        
            if (isset($request->celular)) {
              $cliente->celular = $request->celular;
            }
            if (isset($request->cpf)) {
              $cliente->cpf= $request->cpf;
            }
            if (isset($request->email)) {
              $cliente->email= $request->email;
            }
            if (isset($request->dataNascimento)) {
                $cliente->dataNascimento= $request->dataNascimento;
            }
            if (isset($request->cidade)) {
                $cliente->cidade= $request->cidade;
            }
            if (isset($request->estado)) {
                $cliente->estado= $request->estado;
            }
              if (isset($request->pais)) {
                $cliente->pais= $request->pais;
           }
           if (isset($request->rua)) {
            $cliente->rua= $request->rua;
           }
           if (isset($request->numero)) {
            $cliente->numero= $request->numero;
          }
          if (isset($request->bairro)) {
            $cliente->bairro= $request->bairro;
          }
          if (isset($request->cep)) {
            $cliente->cep= $request->cep;
          }
          if (isset($request->complemento)) {
            $cliente->complemento= $request->complemento;
          }
          if (isset($request->senha)) {
            $cliente->senha= $request->senha;
          }
        
            $cliente-> update();
        
            return response()->json([
              'status' => true,
              'message' => 'cadastro atualizado'
            ]);
          }

          public function esqueciSenha(Request $request){ 

            $cliente = cliente::where('cpf', '=', $request->cpf)->first(); 
            
            if(!isset($cliente)){ 
    
                return response()->json([ 
    
                    'status' => false, 
    
                    'message' => "Cadastro não encontrado" 
    
                ]); 
    
            } 
    
            if(isset($request->senha)){ 
    
                $cliente->senha = $request->senha; 
    
            } 
     
            $cliente-> update(); 
            return response()->json([ 
    
                'status' => true, 
    
                'message' => "Cadastro atualizado" 
    
            ]); 
}
}