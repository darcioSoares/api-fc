<?php

namespace App\Services;

use App\Repositories\MedicoRepository;
use Illuminate\Support\Facades\Validator;

class MedicoService
{
    protected $medicoRepository;

    public function __construct(MedicoRepository $medicoRepository)
    {
        $this->medicoRepository = $medicoRepository;
    }

    public function criarMedico(array $dados)
    {
        $validator = Validator::make($dados, [
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        return $this->medicoRepository->criarMedico($dados);
    }

    public function listarMedicos(?string $nome)
    {
        return $this->medicoRepository->listarMedicos($nome);
    }

    public function listarPorCidade(int $cidadeId, ?string $nome)
    {
        return $this->medicoRepository->listarPorCidade($cidadeId, $nome);
    }

    public function listarPacientes(int $medicoId, bool $apenasAgendadas, ?string $nome)
    {
        return $this->medicoRepository->listarPacientes($medicoId, $apenasAgendadas, $nome);
    }
}
