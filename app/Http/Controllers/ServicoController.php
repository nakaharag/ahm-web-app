<?php

namespace App\Http\Controllers;

use App\Servico;
use Illuminate\Http\Request;
use DB;
class ServicoController extends Controller
{
    public function index(Request $request)
   {
       // return Servico::where('id_company', $request['id'])->get();

    $services = DB::table('servicos')
        ->select(
            DB::raw('any_value(data) as data'), 
            DB::raw('any_value(id) as id'), 
            DB::raw('any_value(titulo) as titulo'), 
            DB::raw('any_value(descricao) as descricao'), 
            DB::raw('any_value(horas) as horas'), 
            DB::raw('MONTH(data) as month'),
            DB::raw('YEAR(data) as year')
        )
        ->where('id_company', $request['id'])
    //   ->groupBy('month', 'year')
        ->orderBy('data', 'desc')
        ->get();
    //return $services;
        return response()->json($services, 200);
   }

   public function periods(Request $request)
   {
       // return Servico::where('id_company', $request['id'])->get();

    $services = DB::table('servicos')
        ->select(
            DB::raw('count(*) as contagem'), 
            DB::raw('MONTH(data) as month'),
            DB::raw('YEAR(data) as year')
        )
        ->where('id_company', $request['id'])
        ->groupBy('month', 'year')
     //   ->orderBy('data', 'desc')
        ->get();
    return $services;
        //return response()->json($services, 200);
   }

   public function store(Request $request)
    {
        $servico =  Servico::create([
            'id_company' => $request['company_id'],
            'titulo' => $request['titulo'],
            'descricao' => $request['descricao'],
            'data' => $request['data'],
            'horas' => $request['horas']
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
