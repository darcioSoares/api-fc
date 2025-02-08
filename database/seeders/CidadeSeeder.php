<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    public function run(): void
    {
        Cidade::insert([
            ['nome' => 'São Paulo', 'estado' => 'SP', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Rio de Janeiro', 'estado' => 'RJ', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Belo Horizonte', 'estado' => 'MG', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Curitiba', 'estado' => 'PR', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Porto Alegre', 'estado' => 'RS', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Salvador', 'estado' => 'BA', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Fortaleza', 'estado' => 'CE', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Recife', 'estado' => 'PE', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Manaus', 'estado' => 'AM', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Brasília', 'estado' => 'DF', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Goiânia', 'estado' => 'GO', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Florianópolis', 'estado' => 'SC', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Natal', 'estado' => 'RN', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Belém', 'estado' => 'PA', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'João Pessoa', 'estado' => 'PB', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Campo Grande', 'estado' => 'MS', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Cuiabá', 'estado' => 'MT', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Aracaju', 'estado' => 'SE', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Maceió', 'estado' => 'AL', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
