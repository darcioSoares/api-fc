<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Services\CidadeService;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    protected $cidadeService;

    public function __construct(CidadeService $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }
    
    public function listar(Request $request)
    {
        $nome = $request->query('nome');
        $cidades = $this->cidadeService->listarCidades($nome);

        return response()->json($cidades, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
