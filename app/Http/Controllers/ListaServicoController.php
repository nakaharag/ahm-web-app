<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListaServico;

class ListaServicoController extends Controller
{
    public function store(Request $request)
    {
        $servico =  ListaServico::create([
            'titulo' => $request['titulo'],
            'descricao' => $request['descricao']
        ]);

        $servico->save();

        return response()->json($servico, 201);
    }

    public function index(Request $request)
    {
        return ListaServico::get();
    }
}
