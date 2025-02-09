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
            ['nome' => 'Dr. João Silva', 'especialidade' => 'Cardiologia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 1],
            ['nome' => 'Dra. Maria Souza', 'especialidade' => 'Dermatologia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 2],
            ['nome' => 'Dr. Carlos Mendes', 'especialidade' => 'Ortopedia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 3],
            ['nome' => 'Dr. Pedro Santos', 'especialidade' => 'Pediatria', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 1],
            ['nome' => 'Dra. Ana Oliveira', 'especialidade' => 'Neurologia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 2],
            ['nome' => 'Dr. Ricardo Lima', 'especialidade' => 'Oftalmologia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 3],
            ['nome' => 'Dr. Felipe Rocha', 'especialidade' => 'Gastroenterologia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 4],
            ['nome' => 'Dra. Camila Martins', 'especialidade' => 'Ginecologia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 5],
            ['nome' => 'Dr. Bruno Almeida', 'especialidade' => 'Ortopedia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 6],
            ['nome' => 'Dra. Patricia Nunes', 'especialidade' => 'Endocrinologia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 7],
            ['nome' => 'Dr. Thiago Ferreira', 'especialidade' => 'Psiquiatria', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 8],
            ['nome' => 'Dra. Vanessa Costa', 'especialidade' => 'Reumatologia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 9],
            ['nome' => 'Dr. Eduardo Ramos', 'especialidade' => 'Urologia', 'created_at' => now(), 'updated_at' => now(), 'cidade_id' => 10],
        ]);
    }
}
