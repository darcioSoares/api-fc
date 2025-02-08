<?php

namespace Database\Seeders;

use App\Models\Medico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    public function run(): void
    {
        Medico::insert([
            ['nome' => 'Dr. João Silva', 'especialidade' => 'Cardiologia','created_at' => now(),'updated_at' => now(), 'cidade_id' => 1],
            ['nome' => 'Dra. Maria Souza', 'especialidade' => 'Dermatologia','created_at' => now(),'updated_at' => now(), 'cidade_id' => 2],
            ['nome' => 'Dr. Carlos Mendes', 'especialidade' => 'Ortopedia','created_at' => now(),'updated_at' => now(), 'cidade_id' => 3],
        ]);
    }
}
