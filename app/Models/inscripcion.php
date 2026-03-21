<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\usuario;

class inscripcion extends Model
{
    public function usuario()
    {
        return $this->belongsTo(usuario::class, 'usuario_id', 'clave_institucional');
    }
}
