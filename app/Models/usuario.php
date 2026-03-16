<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\horario;

class usuario extends Model
{
    public function horarios()
    {
        return $this->hasMany(horario::class, 'usuario_id', 'clave_institucional');
    }
}
