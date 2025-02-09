<?php

namespace App\Services;

use App\Repositories\ConsultaRepository;
use Illuminate\Support\Facades\Validator;

class ConsultaService
{
    protected $consultaRepository;

    public function __construct(ConsultaRepository $consultaRepository)
    {
        $this->consultaRepository = $consultaRepository;
    }

    public function agendarConsulta(array $dados)
    {
        $validator = Validator::make($dados, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'data' => 'required|date_format:Y-m-d H:i:s|after:now',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }
      
        $consultaExistente = $this->consultaRepository->consultaExistente($dados['medico_id'], $dados['data']);
        
        if ($consultaExistente) {
            return ['error' => 'O médico já tem uma consulta agendada nesse horário.'];
        }

        $consulta = $this->consultaRepository->criarConsulta($dados['medico_id'], $dados['paciente_id'], $dados['data']);
        
        return $consulta;
    }
}
