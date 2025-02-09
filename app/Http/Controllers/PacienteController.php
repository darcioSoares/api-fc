<?php

namespace App\Http\Controllers;

use App\Services\PacienteService;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    protected $pacienteService;

    public function __construct(PacienteService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    public function adicionar(Request $request)
    {
        $dados = $request->all();
        $resultado = $this->pacienteService->adicionarPaciente($dados);

        if (isset($resultado['errors'])) {
            return response()->json($resultado, 422);
        }

        return response()->json($resultado, 201);
    }

    public function atualizar(Request $request, $id_paciente)
    {
        $dados = $request->all();
        $resultado = $this->pacienteService->atualizarPaciente($id_paciente, $dados);

        if (isset($resultado['error'])) {
            return response()->json($resultado, 404);
        }

        if (isset($resultado['errors'])) {
            return response()->json($resultado, 422);
        }

        return response()->json($resultado, 200);
    }
}
