<?php

namespace App\Http\Controllers;

use App\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function index(Request $request)
   {
        return Servico::where('id_company', $request['id'])->get();
   }

   public function store(Request $request)
    {
        // $data = $request->validate([
        //     'company_id' => 'required',
        //     'survey_id' => 'required|string',
        //     'result_id' => 'required',
        //     'survey_name' => 'required'
        // ]);

        $servico =  Servico::create([
            'id_company' => $request['company_id'],
            'titulo' => $request['titulo'],
            'descricao' => $request['descricao'],
            'data' => $request['data']
        ]);

        $servico->save();

        return response()->json($servico, 201);
    }
    public function update(Request $request)
   {    
        $servico = Servico::find($request['servico_id']);

        $servico->horas = $request['horas'];

        $servico->save();

        return response()->json($servico, 200);
   }
}
