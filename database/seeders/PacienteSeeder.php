<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        Paciente::insert([
            ['nome' => 'Vilma Oliveira', 'cpf' => '123.456.789-01','created_at' => now(),'updated_at' => now(), 'celular' => '(11) 98765-4321'],
            ['nome' => 'Pedro Santos', 'cpf' => '987.654.321-02','created_at' => now(),'updated_at' => now(), 'celular' => '(21) 91234-5678'],
            ['nome' => 'Mariana Costa', 'cpf' => '159.753.486-03','created_at' => now(),'updated_at' => now(), 'celular' => '(31) 92345-6789'],
            ['nome' => 'Darcio Costa', 'cpf' => '159.987.486-03','created_at' => now(),'updated_at' => now(), 'celular' => '(11) 99845-6789'],
            ['nome' => 'Jose Rui', 'cpf' => '198.753.497-03','created_at' => now(),'updated_at' => now(), 'celular' => '(12) 99875-6789'],
        ]);
    }
}
