<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\materia;
use App\Models\usuario;
use App\Models\grupo;

class horario extends Model
{
    public function materia()
    {
        return $this->belongsTo(materia::class, 'materia_id', 'clave');
    }

    public function usuario()
    {
        return $this->belongsTo(usuario::class, 'usuario_id', 'clave_institucional');
    }

    public function grupos()
    {
        return $this->hasMany(grupo::class);
    }
}
