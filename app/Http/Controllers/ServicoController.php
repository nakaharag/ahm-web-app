<?php

namespace App\Http\Controllers;

use App\Servico;
use Illuminate\Http\Request;
use DB;
class ServicoController extends Controller
{
    public function index(Request $request)
    {
        ///$users = User::all();
       $servico = Servico::with('servicoListas')->get();
       //$a = $request['id']; ::where('id_company', $request['id'])
 
    //    $servico = Servico::with(["servicoListas" => function($q){
    //         $q->where('servicos.id_company', '=', $request['id']);
    //     }]);
    // $servico = Servico::with('servicoListas', function ($query) {
    //     $query->where('servicos.id_company', '=', '4');
    // })->get();

        // $servico = Servico::with(["servicoListas" => function($q){
        //     $q->where('id_company', '=', '4');
        // }])->get();

       // $users = $this->user->with('salutation')->all();

       $servico = DB::table('servicos')
        ->select(
            DB::raw('any_value(data) as data'), 
            DB::raw('any_value(titulo) as titulo'), 
            DB::raw('any_value(descricao) as descricao'), 
            DB::raw('any_value(tempo) as horas'), 
            DB::raw('MONTH(data) as month'),
            DB::raw('YEAR(data) as year')
        )
        ->where('id_company', $request['id'])
        ->join('servico_listas', 'servicos.id_servico_lista', 'servico_listas.id')
    //   ->groupBy('month', 'year')
        ->orderBy('data', 'desc')
        ->get();

        return response()->json(
            [
                'status' => 'success',
                'servicos' => $servico->toArray()
            ], 200);
    }

   public function index_old(Request $request)
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
            'id_servico_lista' => $request['id_servico_lista'],
            'data' => $request['data'],
            'tempo' => $request['tempo']
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
