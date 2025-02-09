<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;


Route::get('/medicos/{id_medico}/pacientes', [MedicoController::class, 'listarPacientes']);
//http://127.0.0.1:8000/api/medicos/2/pacientes?apenas-agendadas=true
//http://127.0.0.1:8000/api/medicos/1/pacientes?nome=vilma


Route::post('/pacientes', [PacienteController::class, 'adicionar']);
Route::post('/pacientes/{id_paciente}', [PacienteController::class, 'atualizar']);


Route::get('/medicos', [MedicoController::class, 'listar']);

Route::get('/cidades', [CidadeController::class, 'listar']);

Route::get('/cidades/{id_cidade}/medicos', [MedicoController::class, 'listarPorCidade']);
// http://127.0.0.1:8000/api/cidades/1/medicos?nome=joão

Route::post('/medicos/consulta', [ConsultaController::class, 'agendar']);

