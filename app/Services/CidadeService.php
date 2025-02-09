<?php

namespace App\Services;

use App\Repositories\CidadeRepository;

class CidadeService
{
    protected $cidadeRepository;

    public function __construct(CidadeRepository $cidadeRepository)
    {
        $this->cidadeRepository = $cidadeRepository;
    }

    public function listarCidades(?string $nome)
    {
        return $this->cidadeRepository->getCidadesPorNome($nome);
    }
}
