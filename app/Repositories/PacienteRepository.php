<?php

namespace App\Repositories;

use App\Models\Paciente;

class PacienteRepository
{
    public function criarPaciente(array $dados)
    {
        return Paciente::create($dados);
    }

    public function buscarPaciente(int $id)
    {
        return Paciente::find($id);
    }

    public function atualizarPaciente(Paciente $paciente, array $dados)
    {
        $paciente->update($dados);
        return $paciente;
    }
}
