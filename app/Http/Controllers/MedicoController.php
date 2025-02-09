<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function listar(Request $request)
    {
        $query = Medico::query();
       
        if ($request->filled('nome')) {
            $nome = strtolower($request->query('nome'));
            
            $nome = preg_replace('/^(dr|dra)\.?[\s]+/i', '', $nome);
            
            $query->whereRaw("LOWER(nome) LIKE ?", ["%{$nome}%"]);
        }
       
        $medicos = $query->orderBy('nome')->get();

        return response()->json($medicos,200, [], JSON_UNESCAPED_UNICODE);
    }

    public function listarPorCidade(Request $request, $id_cidade)
    {
        $query = Medico::where('cidade_id', $id_cidade);

        // Verifica se o parâmetro 'nome' foi passado para busca parcial
        if ($request->filled('nome')) {
            $nome = strtolower($request->query('nome'));

            // Remove "dr." e "dra." da pesquisa
            $nome = preg_replace('/\b(dr\.|dra\.)\s*/i', '', $nome);

            // Busca case-insensitive no MySQL
            $query->whereRaw("LOWER(nome) LIKE ?", ["%{$nome}%"]);
        }

        // Ordena alfabeticamente pelo nome do médico
        $medicos = $query->orderBy('nome')->get();

        return response()->json($medicos, JSON_UNESCAPED_UNICODE);
    }

    public function listarPacientes(Request $request, $id_medico)
    {
        $medico = Medico::find($id_medico);
        if (!$medico) {
            return response()->json(['error' => 'Médico não encontrado'], 404);
        }

        $query = Consulta::where('medico_id', $id_medico)
            ->join('pacientes', 'consultas.paciente_id', '=', 'pacientes.id')
            ->select('pacientes.*', 'consultas.data as consulta_data')
            ->orderBy('consultas.data', 'asc');

        if ($request->boolean('apenas-agendadas')) {
            $query->where('consultas.data', '>', now());
        }

        if ($request->filled('nome')) {
            $nome = strtolower($request->query('nome'));
            $query->whereRaw('LOWER(pacientes.nome) LIKE ?', ["%{$nome}%"]);
        }

        // Obter os pacientes
        $pacientes = $query->get();

        return response()->json($pacientes);
    }
}
