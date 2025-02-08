<?php

namespace Database\Seeders;

use App\Models\Consulta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultaSeeder extends Seeder
{
    public function run(): void
    {
        Consulta::insert([
            ['medico_id' => 1, 'paciente_id' => 1, 'cidade_id' => 1,'created_at' => now(), 'data' => now()],
            ['medico_id' => 2, 'paciente_id' => 2, 'cidade_id' => 2,'created_at' => now(), 'data' => now()->addDays(1)],
            ['medico_id' => 3, 'paciente_id' => 3, 'cidade_id' => 3,'created_at' => now(), 'data' => now()->addDays(2)],
        ]);
    }
}
