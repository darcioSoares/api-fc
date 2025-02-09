<?php

namespace App\Services;

use App\Repositories\PacienteRepository;
use Illuminate\Support\Facades\Validator;

class PacienteService
{
    protected $pacienteRepository;

    public function __construct(PacienteRepository $pacienteRepository)
    {
        $this->pacienteRepository = $pacienteRepository;
    }

    public function adicionarPaciente(array $dados)
    {
        $validator = Validator::make($dados, [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:pacientes,cpf',
            'celular' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        return $this->pacienteRepository->criarPaciente($dados);
    }

    public function atualizarPaciente(int $idPaciente, array $dados)
    {
        $paciente = $this->pacienteRepository->buscarPaciente($idPaciente);

        if (!$paciente) {
            return ['error' => 'Paciente não encontrado'];
        }

        $validator = Validator::make($dados, [
            'nome' => 'sometimes|string|max:255',
            'celular' => 'sometimes|string|max:20',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        return $this->pacienteRepository->atualizarPaciente($paciente, $dados);
    }
}
