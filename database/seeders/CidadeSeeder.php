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
            ['nome' => 'São Paulo','created_at' => now(), 'estado' => 'SP'],
            ['nome' => 'Rio de Janeiro','created_at' => now(), 'estado' => 'RJ'],
            ['nome' => 'Belo Horizonte','created_at' => now(), 'estado' => 'MG'],
        ]);
    }
}
