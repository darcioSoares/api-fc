<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function listar(Request $request)
    {
        $query = Cidade::query();
        
        if ($request->has('nome')) {
            $nome = strtolower($request->query('nome'));
            $query->whereRaw('LOWER(nome) LIKE ?', ["%{$nome}%"]);
        }
   
        $cidades = $query->orderBy('nome')->get();

        return response()->json($cidades, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
