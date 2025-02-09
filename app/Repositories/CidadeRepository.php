<?php

namespace App\Repositories;

use App\Models\Cidade;

class CidadeRepository
{
    public function getCidadesPorNome(?string $nome)
    {
        $query = Cidade::query();

        if ($nome) {
            $query->whereRaw('LOWER(nome) LIKE ?', ["%".strtolower($nome)."%"]);
        }

        return $query->orderBy('nome')->get();
    }
}
