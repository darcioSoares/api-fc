<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
{
    public function adicionar(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:pacientes,cpf',
            'celular' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
     
        $paciente = Paciente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'celular' => $request->celular,
        ]);

        return response()->json($paciente, 201);
    }

    public function atualizar(Request $request, $id_paciente)
    {
        // Buscar o paciente
        $paciente = Paciente::find($id_paciente);

        if (!$paciente) {
            return response()->json(['error' => 'Paciente não encontrado'], 404);
        }

        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'nome' => 'sometimes|string|max:255',
            'celular' => 'sometimes|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Atualizar os dados permitidos
        if ($request->has('nome')) {
            $paciente->nome = $request->nome;
        }

        if ($request->has('celular')) {
            $paciente->celular = $request->celular;
        }

        $paciente->save();

        return response()->json($paciente, 200);
    }
}
