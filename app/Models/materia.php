<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\horario;

class materia extends Model
{
    public function horarios()
    {
        return $this->hasMany(horario::class, 'materia_id', 'clave');
    }
}
