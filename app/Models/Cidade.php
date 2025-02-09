<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'nome',
        'estado',
    ];

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
