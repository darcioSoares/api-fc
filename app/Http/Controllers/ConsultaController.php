<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function agendar(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'data' => 'required|date_format:Y-m-d H:i:s|after:now',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Criar a consulta
        $consulta = Consulta::create([
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
            'cidade_id' => Medico::find($request->medico_id)->cidade_id, // Pegando a cidade do médico
            'data' => $request->data,
        ]);

        return response()->json($consulta, 201);
   }
}
