<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Services\ConsultaService;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    protected $consultaService;

    public function __construct(ConsultaService $consultaService)
    {
        $this->consultaService = $consultaService;
    }

    public function agendar(Request $request)
    {
        $dados = $request->all();
  
        $resultado = $this->consultaService->agendarConsulta($dados);

        if (isset($resultado['errors'])) {
            return response()->json($resultado, 422);
        }

        if (isset($resultado['error'])) {
            return response()->json($resultado, 409);
        }

        return response()->json($resultado, 201);
    }
}
