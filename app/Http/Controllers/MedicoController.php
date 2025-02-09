<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function criarMedico(Request $request)
    { 
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $medico = Medico::create($validated);

        return response()->json([
            'message' => 'Médico cadastrado com sucesso!',
            'medico' => $medico
        ], 201);
    }

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
        
        if ($request->filled('nome')) {
            $nome = strtolower($request->query('nome'));
            
            $nome = preg_replace('/^(dr|dra)\.?[\s]+/i', '', $nome);
                    
            $query->whereRaw("LOWER(nome) LIKE ?", ["%{$nome}%"]);
        }
        
        $medicos = $query->orderBy('nome')->get();

        return response()->json($medicos, JSON_UNESCAPED_UNICODE);
    }

    public function listarPacientes(Request $request, $id_medico) 
    {
        $medico = Medico::find($id_medico);
        if (!$medico) {
            return response()->json(['error' => 'Médico não encontrado'], 404);
        }
    
        $query = Paciente::whereHas('consultas', function ($query) use ($id_medico) {
            $query->where('medico_id', $id_medico);
        })->with(['consultas' => function ($query) {
            $query->select(['id','paciente_id', 'data', 'created_at', 'updated_at','deleted_at']) 
                  ->orderBy('data', 'asc');
        }]);
        

        if ($request->boolean('apenas-agendadas')) {
            $query->whereHas('consultas', function ($query) {
                $query->where('data', '>', now());
            });
        }

        if ($request->filled('nome')) {
            $nome = strtolower(trim($request->query('nome')));
            $nome = preg_replace('/^(dr|dra)\.?[\s]+/i', '', $nome);
            $query->whereRaw('LOWER(nome) LIKE ?', ["%{$nome}%"]);
        }

        $pacientes = $query->get()->map(function ($paciente) {
            $paciente->consultas->each(function ($consulta) {
                $consulta->makeVisible(['id', 'created_at', 'updated_at'])
                         ->makeHidden(['paciente_id']);
            });
            return $paciente;
        });
        

        return response()->json($pacientes);
    }
        
}
