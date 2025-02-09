<?php

namespace App\Repositories;

use App\Models\Consulta;
use App\Models\Medico;

class ConsultaRepository
{
    public function consultaExistente(int $medicoId, string $data)
    {
        return Consulta::where('medico_id', $medicoId)
            ->where('data', $data)
            ->exists();
    }

    public function criarConsulta(int $medicoId, int $pacienteId, string $data)
    {
        $cidadeId = Medico::find($medicoId)->cidade_id;

        return Consulta::create([
            'medico_id' => $medicoId,
            'paciente_id' => $pacienteId,
            'cidade_id' => $cidadeId,
            'data' => $data,
        ]);
    }
}
