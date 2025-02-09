<?php

namespace App\Repositories;

use App\Models\Medico;
use App\Models\Paciente;

class MedicoRepository
{
    public function criarMedico(array $dados)
    {
        return Medico::create($dados);
    }

    public function listarMedicos(?string $nome)
    {
        $query = Medico::query();

        if ($nome) {
            $nome = preg_replace('/^(dr|dra)\.?[\s]+/i', '', strtolower($nome));
            $query->whereRaw("LOWER(nome) LIKE ?", ["%{$nome}%"]);
        }

        return $query->orderBy('nome')->get();
    }

    public function listarPorCidade(int $cidadeId, ?string $nome)
    {
        $query = Medico::where('cidade_id', $cidadeId);

        if ($nome) {
            $nome = preg_replace('/^(dr|dra)\.?[\s]+/i', '', strtolower($nome));
            $query->whereRaw("LOWER(nome) LIKE ?", ["%{$nome}%"]);
        }

        return $query->orderBy('nome')->get();
    }

    public function listarPacientes(int $medicoId, bool $apenasAgendadas, ?string $nome)
    {
        $query = Paciente::whereHas('consultas', function ($query) use ($medicoId) {
            $query->where('medico_id', $medicoId);
        })->with(['consultas' => function ($query) {
            $query->select(['id', 'paciente_id', 'data', 'created_at', 'updated_at', 'deleted_at'])
                  ->orderBy('data', 'asc');
        }]);

        if ($apenasAgendadas) {
            $query->whereHas('consultas', function ($query) {
                $query->where('data', '>', now());
            });
        }

        if ($nome) {
            $nome = preg_replace('/^(dr|dra)\.?[\s]+/i', '', strtolower(trim($nome)));
            $query->whereRaw('LOWER(nome) LIKE ?', ["%{$nome}%"]);
        }

        return $query->get()->map(function ($paciente) {
            $paciente->consultas->each(function ($consulta) {
                $consulta->makeVisible(['id', 'created_at', 'updated_at'])
                         ->makeHidden(['paciente_id']);
            });
            return $paciente;
        });
    }
}
