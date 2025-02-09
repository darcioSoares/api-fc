<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use App\Services\MedicoService;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    protected $medicoService;

    public function __construct(MedicoService $medicoService)
    {
        $this->medicoService = $medicoService;
    }

    public function criarMedico(Request $request)
    {
        $dados = $request->all();

        $resultado = $this->medicoService->criarMedico($dados);

        if (isset($resultado['errors'])) {
            return response()->json($resultado, 422);
        }

        return response()->json([
            'message' => 'Médico cadastrado com sucesso!',
            'medico' => $resultado
        ], 201);
    }

    public function listar(Request $request)
    {
        $nome = $request->query('nome');
        $medicos = $this->medicoService->listarMedicos($nome);

        return response()->json($medicos, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function listarPorCidade(Request $request, $id_cidade)
    {
        $nome = $request->query('nome');
        $medicos = $this->medicoService->listarPorCidade($id_cidade, $nome);

        return response()->json($medicos, JSON_UNESCAPED_UNICODE);
    }

    public function listarPacientes(Request $request, $id_medico)
    {
        $apenasAgendadas = $request->boolean('apenas-agendadas');
        $nome = $request->query('nome');

        $pacientes = $this->medicoService->listarPacientes($id_medico, $apenasAgendadas, $nome);

        if ($pacientes->isEmpty()) {
            return response()->json(['error' => 'Médico não encontrado ou sem pacientes'], 404);
        }

        return response()->json($pacientes);
    }
}
