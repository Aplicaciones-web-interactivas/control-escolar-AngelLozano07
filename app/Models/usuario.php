<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\horario;
use App\Models\inscripcion;

class usuario extends Model
{
    public function horarios()
    {
        return $this->hasMany(horario::class, 'usuario_id', 'clave_institucional');
    }

    public function inscripciones()
    {
        return $this->hasMany(inscripcion::class, 'usuario_id', 'clave_institucional');
    }
}
