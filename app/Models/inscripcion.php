<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\grupo;
use App\Models\User;

class inscripcion extends Model
{
    protected $table = 'inscripciones';

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'clave_institucional');
    }

    public function grupo()
    {
        return $this->belongsTo(grupo::class);
    }
}
