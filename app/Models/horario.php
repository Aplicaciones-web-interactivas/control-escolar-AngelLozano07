<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\materia;
use App\Models\User;
use App\Models\grupo;

class horario extends Model
{
    public function materia()
    {
        return $this->belongsTo(materia::class, 'materia_id', 'clave');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'clave_institucional');
    }
}
