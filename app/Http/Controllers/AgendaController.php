<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
     public function store(AgendaFormRequest $request){
        $agenda = Agenda::create([
            'profissional_id' => $request->profissional_id,
            'agenda_id' => $request->agenda_id,
            'servico_id' => $request->servico_id,
            'data_hora' =>$request->data_hora,
            'tipo_pagamento'=>$request-> tipo_pagamento,
            'valor'=>$request->valor,
        ]);
        return response()->json([
            "success" => true,
            "message"=> "Agenda cadastrada com sucesso",
            "data"=> $agenda
        ],200);
    }

     public function retornarTodos()
     {   $agendas = Agenda::all();
        return response()->json([
            'status' => true,
            'data' => $agendas
        ]);
            
        }
        public function pesquisarPorAgenda(Request $request){
            $agendas = Agenda::where('data_hora', '>=', $request->data_hora)->where('profissional_id', '=',  $request->profissional_id)->get();
        
            if(count($agendas)>0){
                return response()->json([
                    'status'=>true,
                    'data'=> $agendas
                ]);
            }
            return response()->json([
                'status'=>false,
                 'data'=> 'Não há resultados para a pesquisa.'
                ]);
        
        }   
          public function excluir($id){
            $agenda = Agenda::find($id);

            if(!isset($agenda)){
                return response()-> json ([
                    'status'=> false,
                    'message'=> " Cadastro nao encontrado"
                ]);
            }
            $agenda->delete();

            return response()->json([
                'status'=> true,
                'message'=> "Cadastro excluido com sucesso"
            ]);
        }

     public function update(Request $request){
        $agenda= Agenda::find($request-> id);


        if(isset($request->profissional_id)){
            $agenda->profissional_id = $request->profissional_id;
        }
        if(isset($request->agenda_id)){
            $agenda->agenda_id = $request->agenda_id;
     }
     if(isset($request->servico_id)){
        $agenda->servico_id = $request->servico_id;
    }
       if(isset($request->data_hora)){
        $agenda->data_hora = $request->data_hora;
     }
    
    if(isset($request->tipo_pagamento)){
       $agenda->tipo_pagamento = $request->tipo_pagamento;
     
    }
    
    if(isset($request->valor)){
        $agenda->valor = $request->valor;
}
 $agenda->update();
  return response()-> json([
    'status' => true,
    'message'=> "Cadastro atualizado"
  ]);
}
}