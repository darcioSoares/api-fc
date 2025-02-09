<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AuthController;

Route::get('/', function(){
    return  'Api Teste Facil consulta em funcionamento!';
});


Route::post('/register', [AuthController::class, 'registrar']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'usuarioAutenticado']);
});

Route::get('/medicos', [MedicoController::class, 'listar']);
Route::get('/cidades', [CidadeController::class, 'listar']);
Route::get('/cidades/{id_cidade}/medicos', [MedicoController::class, 'listarPorCidade']);

Route::middleware('auth:api')->post('/medicos', [MedicoController::class, 'criarMedico']);

Route::middleware('auth:api')->get('/medicos/{id_medico}/pacientes', [MedicoController::class, 'listarPacientes']);

Route::middleware('auth:api')->post('/medicos/consulta', [ConsultaController::class, 'agendar']);

Route::middleware('auth:api')->post('/pacientes', [PacienteController::class, 'adicionar']);
Route::middleware('auth:api')->put('/pacientes/{id_paciente}', [PacienteController::class, 'atualizar']);







